@extends('layout')

@section('content')
<div class="container mx-auto py-8 px-4">


<h2 class="text-yellow-400 text-3xl font-bold mb-6 text-center">New for You</h2>


    @if(isset($error))
        <div class="text-center text-red-400 mb-4">
            {{ $error }}
        </div>
    @endif

    @if($userRatings < 5)
        <div class="text-center text-yellow-400 mb-4">
            Rate more films to get better recommendations! ({{ $userRatings }}/5 ratings)
        </div>
    @endif

    @if($recommendedFilms->isEmpty())
        <p class="text-center text-gray-400">No personalized recommendations available at the moment.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($recommendedFilms as $film)
                <a href="{{ route('films.display', ['id' => $film->id]) }}" class="group">
                    <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300" style="height: 500px;">
                        <!-- Image Section -->
                        @if(isset($film->gambar))
                            <img src="{{ asset('storage/' . $film->gambar) }}" 
                                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" 
                                 alt="{{ $film->title ?? 'Unknown Title' }}">
                        @else
                            <div class="w-full h-64 bg-gray-700 flex items-center justify-center text-gray-400">
                                <span class="text-lg">No Image</span>
                            </div>
                        @endif

                        <div class="p-4 overflow-hidden" style="height: calc(500px - 256px);">
                            <!-- Film Title -->
                            <h5 class="text-lg font-bold text-yellow-400 mb-2 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                {{ $film->title ?? 'Untitled' }}
                            </h5>

                            <!-- Film Rating -->
                            <p class="text-sm mb-1">
                                <span class="text-yellow-400">&#9733;</span> {{ $film->rating ?? 'N/A' }}
                            </p>

                            <!-- Film Genre -->
                            <p class="text-sm text-blue-400 truncate">
                                Genre: {{ $film->genre ?? 'Unknown Genre' }}
                            </p>

                            <!-- Hybrid Score -->
                            @if(isset($hybridScores[$film->id]))
                            <p class="text-sm text-gray-300">
                                Recommendation Score: <strong>{{ number_format($hybridScores[$film->id], 2) }}</strong>
                            </p>
                            @endif

                            <!-- Film Description -->
                            <p class="text-sm text-gray-400 mt-2 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                {{ $film->description ?? 'No description available.' }}
                            </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif
</div>

<footer class="bg-gray-800 text-gray-400 text-center py-4 mt-8">
    <p>&copy; {{ date('Y') }} Film Recommendations. All rights reserved.</p>
</footer>
@endsection
