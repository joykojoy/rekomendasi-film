<?php
namespace App\Services;

use App\Models\Film;
use App\Models\UserRating;
use App\Models\HybridFill;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecommendationService
{
    public function getRecommendations($userId)
    {
        $recommendationResults = $this->getRecommendationsWithScores($userId);
        return $recommendationResults['films'];
    }

    public function getRecommendationsWithScores($userId)
    {
        $watchedFilms = UserRating::where('user_id', $userId)
            ->pluck('film_id')
            ->toArray();
        
        $unwatchedFilms = Film::whereNotIn('id', $watchedFilms)->get();
        
        $predictions = [];

        // Predict ratings for unwatched films
        foreach ($unwatchedFilms as $film) {
            $collaborativePrediction = $this->calculateCollaborativeFiltering($userId, $film);
            $contentPrediction = $this->calculateContentBasedFiltering($userId, $film);

            // Hybrid prediction (weighted average)
            $hybridPrediction = 0.6 * $collaborativePrediction + 0.4 * $contentPrediction;
            
            if ($hybridPrediction > 0) {
                $predictions[$film->id] = $hybridPrediction;
            }
        }

        // Sort predictions
        arsort($predictions);
        
        // Fetch and sort recommended films
        $recommendedFilms = Film::whereIn('id', array_keys($predictions))
            ->get()
            ->map(function ($film) use ($predictions) {
                $film->prediction_score = $predictions[$film->id];
                return $film;
            })
            ->sortByDesc('prediction_score')
            ->take(30);

        return [
            'films' => $recommendedFilms,
            'scores' => $predictions
        ];
    }
    public function getFilteredRecommendations($userId, $minScore = 0.4, $maxScore = 0.7)
    {
        try {
            // Get existing hybrid fill data
            $filteredRecommendations = HybridFill::where('user_id', $userId)
                ->whereBetween('score', [$minScore, $maxScore])
                ->orderByDesc('score')
                ->get();

            // If no pre-calculated data exists, calculate it
            if ($filteredRecommendations->isEmpty()) {
                $this->calculateGlobalHybridScores($userId);
                
                $filteredRecommendations = HybridFill::where('user_id', $userId)
                    ->whereBetween('score', [$minScore, $maxScore])
                    ->orderByDesc('score')
                    ->get();
            }

            // Get the film details for the filtered recommendations
            $recommendedFilms = Film::whereIn('id', $filteredRecommendations->pluck('film_id'))
                ->get()
                ->map(function ($film) use ($filteredRecommendations) {
                    $film->prediction_score = $filteredRecommendations
                        ->where('film_id', $film->id)
                        ->first()
                        ->score;
                    return $film;
                })
                ->sortByDesc('prediction_score');

            return [
                'films' => $recommendedFilms,
                'scores' => $filteredRecommendations->pluck('score', 'film_id')->toArray()
            ];

        } catch (\Exception $e) {
            Log::error('Filtered Recommendations Error', [
                'user_id' => $userId,
                'min_score' => $minScore,
                'max_score' => $maxScore,
                'error' => $e->getMessage()
            ]);

            return [
                'films' => collect([]),
                'scores' => []
            ];
        }
    }

    public function calculateGlobalHybridScores($userId)
    {
        try {
            // Get all films in the database
            $allFilms = Film::all();
            
            // Prepare to store hybrid scores
            $hybridPredictions = [];

            // Calculate hybrid scores for each film
            foreach ($allFilms as $film) {
                $collaborativePrediction = $this->calculateCollaborativeFiltering($userId, $film);
                $contentPrediction = $this->calculateContentBasedFiltering($userId, $film);

                // Hybrid prediction (weighted average)
                $hybridPrediction = 0.6 * $collaborativePrediction + 0.4 * $contentPrediction;
                
                if ($hybridPrediction > 0) {
                    $hybridPredictions[$film->id] = $hybridPrediction;
                }
            }

            // Sort predictions
            arsort($hybridPredictions);

            // Save to HybridFill table
            return $this->saveHybridFillResults($userId, $hybridPredictions);

        } catch (\Exception $e) {
            Log::error('Global Hybrid Scoring Error', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);

            return [];
        }
    }

    private function saveHybridFillResults($userId, $predictions)
    {
        // Clear previous recommendations for this user
        HybridFill::where('user_id', $userId)->delete();

        // Prepare bulk insert data
        $hybridFillData = [];
        foreach ($predictions as $filmId => $score) {
            $hybridFillData[] = [
                'user_id' => $userId,
                'film_id' => $filmId,
                'score' => $score,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        // Bulk insert recommendations
        HybridFill::insert($hybridFillData);

        return $predictions;
    }

    private function calculateCollaborativeFiltering($userId, $film)
    {
        // Fetch users who rated the film
        $similarUsers = UserRating::where('film_id', $film->id)
            ->pluck('user_id')
            ->toArray();
        
        $similaritySum = 0;
        $weightedSum = 0;

        foreach ($similarUsers as $simUserId) {
            // Get ratings for both users
            $user1Ratings = UserRating::where('user_id', $userId)
                ->pluck('rating', 'film_id');
            $user2Ratings = UserRating::where('user_id', $simUserId)
                ->pluck('rating', 'film_id');

            // Find common films rated by both users
            $commonFilms = $user1Ratings->keys()->intersect($user2Ratings->keys());

            if ($commonFilms->isNotEmpty()) {
                $numerator = 0;
                $user1SquaredSum = 0;
                $user2SquaredSum = 0;

                // Calculate similarity using cosine similarity
                foreach ($commonFilms as $commonFilmId) {
                    $user1Rating = $user1Ratings[$commonFilmId];
                    $user2Rating = $user2Ratings[$commonFilmId];

                    $numerator += $user1Rating * $user2Rating;
                    $user1SquaredSum += pow($user1Rating, 2);
                    $user2SquaredSum += pow($user2Rating, 2);
                }

                $denominator = sqrt($user1SquaredSum) * sqrt($user2SquaredSum);
                $similarity = $denominator == 0 ? 0 : $numerator / $denominator;

                // Get rating of the current film by similar user
                $filmRating = UserRating::where('user_id', $simUserId)
                    ->where('film_id', $film->id)
                    ->value('rating');

                // Weighted prediction
                if ($filmRating) {
                    $similaritySum += abs($similarity);
                    $weightedSum += $similarity * ($filmRating - UserRating::where('user_id', $simUserId)->avg('rating'));
                }
            }
        }

        // Return prediction based on user's average rating and weighted similarities
        return UserRating::where('user_id', $userId)->avg('rating')
            + ($similaritySum > 0 ? $weightedSum / $similaritySum : 0);
    }

    private function calculateContentBasedFiltering($userId, $film)
    {
        // Get user's previous ratings
        $userRatings = UserRating::where('user_id', $userId)->get();
        $contentPrediction = 0;
        $similaritySumContent = 0;

        foreach ($userRatings as $rating) {
            $ratedFilm = Film::find($rating->film_id);
            
            if ($ratedFilm) {
                // Compare genres
                $genres1 = explode(',', $film->genre);
                $genres2 = explode(',', $ratedFilm->genre);

                // Calculate genre similarity
                $commonGenres = array_intersect($genres1, $genres2);
                $similarity = count($commonGenres) / max(count($genres1), count($genres2));

                // Weighted prediction based on genre similarity
                $contentPrediction += $similarity * $rating->rating;
                $similaritySumContent += $similarity;
            }
        }

        // Return normalized content-based prediction
        return $similaritySumContent > 0 ? 
            $contentPrediction / $similaritySumContent : 0;
    }
}