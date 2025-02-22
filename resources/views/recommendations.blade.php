@extends('layout')

@section('content')
<div class="container mx-auto py-4 sm:py-8 px-2 sm:px-4">
    <h2 class="text-yellow-400 text-xl sm:text-3xl font-bold mb-4 sm:mb-6 text-center">Film Recommendations Based on Hybrid Score</h2>

    @if($recommendedFilms->isEmpty())
        <p class="text-center text-gray-400">No recommendations available.</p>
    @else
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-6">
            @foreach ($recommendedFilms as $film)
                @if (isset($hybridScores[$film->id]) && $hybridScores[$film->id] > 0)
                    <a href="{{ route('films.display', ['id' => $film->id]) }}" class="group">
                        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300" style="height: 500px;">
                            <!-- Image Section -->
                            @if(isset($film->gambar))
                                <img src="{{ asset('storage/' . $film->gambar) }}" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" 
                                     alt="{{ $film->title }}">
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
                                <p class="text-sm text-gray-300">
                                    Hybrid Score: <strong>{{ number_format($hybridScores[$film->id], 2) }}</strong>
                                </p>

                                <!-- Film Description -->
                                <p class="text-sm text-gray-400 mt-2 overflow-hidden" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                                    {{ $film->description ?? 'No description available.' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>

<footer class="bg-gray-800 text-gray-400 text-center py-4 mt-8">
    <p>&copy; {{ date('Y') }} Film Recommendations. All rights reserved.</p>
</footer>
@endsection
