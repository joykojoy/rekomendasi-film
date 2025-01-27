<?php
// app/Http/Controllers/RecommendationController.php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\UserRating;
use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    // Content-Based Filtering: Cosine Similarity
    private function cosineSimilarity($vectorA, $vectorB)
    {
        $intersection = array_intersect(explode(',', $vectorA), explode(',', $vectorB));
        return count($intersection) / sqrt(count(explode(',', $vectorA)) * count(explode(',', $vectorB)));
    }

    private function calculateContentSimilarity($film, $films)
    {
        $similarities = [];
        foreach ($films as $otherFilm) {
            if ($film->id != $otherFilm->id) {
                $similarity = $this->cosineSimilarity($film->genre, $otherFilm->genre);
                $similarities[$otherFilm->id] = $similarity;
            }
        }
        arsort($similarities);
        return $similarities;
    }

    // Collaborative Filtering: Similarity between users
    private function calculateUserSimilarity($userId, $otherUserId)
    {
        // Use Cosine Similarity between users based on their ratings
        $userRatings = UserRating::where('user_id', $userId)->get();
        $otherUserRatings = UserRating::where('user_id', $otherUserId)->get();

        $ratingsA = [];
        $ratingsB = [];

        foreach ($userRatings as $rating) {
            $ratingsA[$rating->film_id] = $rating->rating;
        }

        foreach ($otherUserRatings as $rating) {
            $ratingsB[$rating->film_id] = $rating->rating;
        }

        $commonFilms = array_intersect_key($ratingsA, $ratingsB);
        if (count($commonFilms) == 0) return 0;

        $numerator = 0;
        $denominatorA = 0;
        $denominatorB = 0;

        foreach ($commonFilms as $filmId => $rating) {
            $numerator += ($ratingsA[$filmId] * $ratingsB[$filmId]);
            $denominatorA += pow($ratingsA[$filmId], 2);
            $denominatorB += pow($ratingsB[$filmId], 2);
        }

        return $numerator / (sqrt($denominatorA) * sqrt($denominatorB));
    }

    private function predictCollaborativeRatings($userId, $films)
    {
        $userRatings = UserRating::where('user_id', $userId)->get();
        $otherUsersRatings = UserRating::where('user_id', '!=', $userId)->get();

        $predictions = [];
        foreach ($films as $film) {
            $numerator = 0;
            $denominator = 0;
            foreach ($otherUsersRatings as $otherRating) {
                if ($otherRating->film_id == $film->id) {
                    $similarity = $this->calculateUserSimilarity($userId, $otherRating->user_id);
                    $numerator += $similarity * $otherRating->rating;
                    $denominator += abs($similarity);
                }
            }
            $predictions[$film->id] = ($denominator > 0) ? $numerator / $denominator : 0;
        }
        arsort($predictions);
        return $predictions;
    }

    // Hybrid Recommendation combining Content-based and Collaborative Filtering
    public function recommendFilms($userId)
    {
        $films = Film::all();

        // Get content-based scores
        $contentScores = [];
        foreach ($films as $film) {
            $contentScores[$film->id] = $this->calculateContentSimilarity($film, $films);
        }

        // Get collaborative filtering scores
        $collabScores = $this->predictCollaborativeRatings($userId, $films);

        // Combine the scores
        $hybridScores = [];
        foreach ($films as $film) {
            $hybridScores[$film->id] = (0.5 * array_sum($contentScores[$film->id])) + (0.5 * $collabScores[$film->id]);
        }

        arsort($hybridScores);
    $recommendedFilmIds = array_keys($hybridScores);

    // Fetch recommended films
    $recommendedFilms = Film::whereIn('id', $recommendedFilmIds)->paginate(12);

    // Pass the films and hybrid scores to the view

        return view('recommendations', compact('recommendedFilms', 'hybridScores'));
    }

    public function index($userId)
    {
        // Call recommendFilms to get recommended films for the given user
        return $this->recommendFilms($userId);
    }
    public function showDashboard()
    {
        $films = Film::all();
    
        // Hitung ulang Hybrid Score untuk setiap film
        $hybridScores = [];
        foreach ($films as $film) {
            $contentScores = $this->calculateContentSimilarity($film, $films);
            $collabScores = $this->predictCollaborativeRatings(auth()->id(), $films);
    
            $hybridScores[$film->id] = (0.5 * array_sum($contentScores)) + (0.5 * $collabScores[$film->id]);
        }
    
        // Urutkan berdasarkan Hybrid Score
        arsort($hybridScores);
        $topPicks = Film::whereIn('id', array_keys($hybridScores))->get();
    
        return view('dashboard', compact('topPicks'));
    }
    

}
