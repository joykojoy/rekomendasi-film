<?php
namespace App\Http\Controllers;

use App\Services\RecommendationService;
use App\Models\Film;
use App\Models\UserRating;
use App\Models\HybridFill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class FilmController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function dashboard()
    {
        // Optimize queries by selecting only needed columns and limiting results
        $topPicks = Film::select('id', 'title', 'gambar', 'rating')
                        ->orderBy('rating', 'desc')
                        ->take(5)
                        ->get();

        if (Auth::check()) {
            try {
                $recommendations = $this->recommendationService
                                     ->getRecommendations(Auth::id())
                                     ->take(5);
            } catch (\Exception $e) {
                Log::error('Dashboard recommendation error', [
                    'user_id' => Auth::id(),
                    'error'   => $e->getMessage()
                ]);
                $recommendations = Film::select('id', 'title', 'gambar')
                                     ->latest()
                                     ->take(5)
                                     ->get();
            }
        } else {
            $recommendations = Film::select('id', 'title', 'gambar')
                                 ->latest()
                                 ->take(5)
                                 ->get();
        }

        // Optimize New For You query with specific columns
        $newForYou = Auth::check() ? 
            DB::table('films')
              ->join('hybridfill', 'films.id', '=', 'hybridfill.film_id')
              ->where('hybridfill.user_id', Auth::id())
              ->whereBetween('hybridfill.score', [4, 7])
              ->select('films.id', 'films.title', 'films.gambar', 'hybridfill.score')
              ->orderBy('hybridfill.score', 'DESC')
              ->take(5)
              ->get() : 
            collect();

        return view('dashboard', compact('topPicks', 'recommendations', 'newForYou'));
    }
    
public function topPicks()
{
    $films = Film::orderby('rating', 'desc')->take(12)->get();
    return view('top-picks', compact('films'));
}

    
    public function newforyou()
    {
        $userId = Auth::id();
    
        if (!$userId) {
            return redirect()->route('login')
                ->with('error', 'Please login to see personalized recommendations.');
        }
    
        try {
            // Optimize query by selecting specific columns and using index
            $recommendedFilms = DB::table('films')
                ->join('hybridfill', 'films.id', '=', 'hybridfill.film_id')
                ->where('hybridfill.user_id', $userId)
                ->whereBetween('hybridfill.score', [4, 7])
                ->select('films.id', 'films.title', 'films.gambar', 'films.genre', 
                        'films.description', 'hybridfill.score')
                ->orderBy('hybridfill.score', 'DESC')
                ->get();
    
            if ($recommendedFilms->isEmpty()) {
                return view('films.newforyou', [
                    'recommendedFilms' => collect(),
                    'hybridScores' => [],
                    'userRatings' => UserRating::where('user_id', $userId)->count(),
                    'error' => 'No films found with scores between 4 and 7.'
                ]);
            }
    
            return view('films.newforyou', [
                'recommendedFilms' => $recommendedFilms,
                'hybridScores' => $recommendedFilms->pluck('score', 'id'),
                'userRatings' => UserRating::where('user_id', $userId)->count()
            ]);
    
        } catch (\Exception $e) {
            Log::error('Failed to retrieve new-for-you recommendations', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);
    
            return view('films.newforyou', [
                'recommendedFilms' => collect(),
                'hybridScores' => [],
                'error' => 'Unable to generate personalized recommendations.'
            ]);
        }
    }
    
    
    
    public function getRecommendations(Request $request, $userId = null)
    {
        $userId = $userId ?? Auth::id();

        if (!$userId) {
            return redirect()->route('login')
                ->with('error', 'Please login to see personalized recommendations.');
        }

        try {
            $recommendationResults = $this->recommendationService->getRecommendationsWithScores($userId);
            $recommendedFilms = $recommendationResults['films'];
            $hybridScores = $recommendationResults['scores'];

            if ($recommendedFilms->isEmpty()) {
                $recommendedFilms = Film::orderBy('rating', 'desc')->take(200)->get();
                $hybridScores = $recommendedFilms->mapWithKeys(fn($film) => [$film->id => $film->rating]);
            }

            try {
                HybridFill::where('user_id', $userId)->delete();
                $hybridFillData = [];
                foreach ($hybridScores as $filmId => $score) {
                    $hybridFillData[] = [
                        'user_id' => $userId,
                        'film_id' => $filmId,
                        'score' => $score,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                }
                HybridFill::insert($hybridFillData);
            } catch (\Exception $saveError) {
                Log::error('Failed to save hybrid recommendations', [
                    'user_id' => $userId,
                    'error' => $saveError->getMessage()
                ]);
            }

            return view('recommendations', [
                'recommendedFilms' => $recommendedFilms,
                'hybridScores' => $hybridScores,
                'userRatings' => UserRating::where('user_id', $userId)->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Recommendation retrieval failed', [
                'user_id' => $userId,
                'error' => $e->getMessage()
            ]);

            $recommendedFilms = Film::latest()->take(20)->get();
            $hybridScores = $recommendedFilms->mapWithKeys(fn($film) => [$film->id => $film->rating]);

            return view('recommendations', [
                'recommendedFilms' => $recommendedFilms,
                'hybridScores' => $hybridScores,
                'error' => 'Unable to generate personalized recommendations. Showing latest films.'
            ]);
        }
    }

    public function displayFilm($id)
    {
        $film = Film::findOrFail($id);
        $comments = UserRating::where('film_id', $id)->latest()->get();
        
        $similarFilms = null;
        if (Auth::check()) {
            try {
                $similarFilms = $this->recommendationService
                    ->getRecommendations(Auth::id())
                    ->where('id', '!=', $id)
                    ->take(4);
            } catch (\Exception $e) {
                Log::error('Similar films recommendation error', [
                    'user_id' => Auth::id(),
                    'film_id' => $id,
                    'error' => $e->getMessage()
                ]);
                $similarFilms = Film::where('genre', 'like', "%{$film->genre}%")
                    ->where('id', '!=', $id)
                    ->take(4)
                    ->get();
            }
        }

        return view('films.show', compact('film', 'comments', 'similarFilms'));
    }
    public function advanceSearch(Request $request)
{
    $query = Film::query();

    // Search in title, description, and synopsis
    if ($request->has('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->input('search') . '%')
              ->orWhere('description', 'like', '%' . $request->input('search') . '%')
              ->orWhere('sinopsis', 'like', '%' . $request->input('search') . '%');
        });
    }

    // Handle genre filtering with AND logic
    if ($request->filled('genre1') && $request->filled('genre2')) {
        $genre1 = trim($request->genre1);
        $genre2 = trim($request->genre2);
        
        $query->where(function($q) use ($genre1, $genre2) {
            $q->where('genre', 'LIKE', "%{$genre1}%")
              ->where('genre', 'LIKE', "%{$genre2}%");
        });
    } elseif ($request->filled('genre1')) {
        $query->where('genre', 'LIKE', "%{$request->genre1}%");
    } elseif ($request->filled('genre2')) {
        $query->where('genre', 'LIKE', "%{$request->genre2}%");
    }

    // Sort by update date
    if ($request->has('sort_by_update')) {
        $query->orderBy('updated_at', $request->input('sort_by_update') == 'desc' ? 'desc' : 'asc');
    }

    // Sort by rating
    if ($request->has('sort_by_rating')) {
        $query->orderBy('rating', $request->input('sort_by_rating') == 'desc' ? 'desc' : 'asc');
    }

    // Sort by hybrid rating
    if ($request->has('sort_by_hybrid') && Auth::check()) {
        $userId = Auth::id();
        $query->leftJoin('hybridfill', function($join) use ($userId) {
            $join->on('films.id', '=', 'hybridfill.film_id')
                 ->where('hybridfill.user_id', '=', $userId);
        })
        ->orderBy('hybridfill.score', $request->input('sort_by_hybrid') == 'desc' ? 'desc' : 'asc')
        ->select('films.*');
    }

    // Sort by genre
    if ($request->has('sort_by_genre')) {
        $query->orderBy('genre', $request->input('sort_by_genre') == 'desc' ? 'desc' : 'asc');
    }

    $films = $query->paginate(12);

    // Get unique genres
    $allGenres = Film::pluck('genre')->toArray();
    $genres = [];

    foreach ($allGenres as $genreString) {
        $separatedGenres = explode(',', $genreString);
        foreach ($separatedGenres as $genre) {
            $trimmedGenre = trim($genre);
            if (!empty($trimmedGenre) && !in_array($trimmedGenre, $genres)) {
                $genres[] = $trimmedGenre;
            }
        }
    }

    sort($genres); // Sort genres alphabetically

    return view('films.advance-search', compact('films', 'genres'));
}

      
    

    public function storeRating(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|between:1,10',
            'comment' => 'required|string|max:255',
        ]);
    
        try {
            UserRating::create([
                'film_id' => $id,
                'user_id' => auth()->id(),
                'rating' => (float) $request->rating,
                'comment' => trim($request->comment),
            ]);
    
            if ($request->ajax()) {
                return response()->json(['success' => 'Your rating and comment have been submitted.']);
            }
    
            return redirect()->route('films.display', $id)
                ->with('success', 'Your rating and comment have been submitted.');
                
        } catch (\Exception $e) {
            \Log::error('Rating Error: ' . $e->getMessage());
            
            return back()
                ->with('error', 'Failed to submit rating. Please try again.')
                ->withInput();
        }
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        Film::create($data);
        return redirect()->route('films.index')->with('success', 'Film created successfully.');
    }

    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    public function index(Request $request)
{
    $query = Film::query();

    if ($request->has('search') && !empty($request->search)) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('genre', 'like', '%' . $request->search . '%');
    }

    $films = $query->paginate(10);
    return view('films.index', compact('films'));
}


    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'gambar' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:10',
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('images', 'public');
        }

        $film->update($data);
        return redirect()->route('films.index')->with('success', 'Film updated successfully.');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Film deleted successfully.');
    }
}
