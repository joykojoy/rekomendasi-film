@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Recommendations</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">
    <div class="container mx-auto py-8 px-4">
        <h2 class="text-yellow-400 text-3xl font-bold mb-6 text-center">Film Recommendations Based on Hybrid Score</h2>

        @if($recommendedFilms->isEmpty())
            <p class="text-center text-gray-400">No recommendations available.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($recommendedFilms as $film)
                    @if (isset($hybridScores[$film->id]) && $hybridScores[$film->id] > 0)
                        <a href="{{ route('films.display', ['id' => $film->id]) }}" class="group">
                            <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                                <!-- Image Section -->
                                <img src="{{ isset($film->gambar) ? asset('storage/' . $film->gambar) : 'https://via.placeholder.com/300x450' }}" 
                                     class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300" 
                                     alt="{{ $film->title ?? 'Unknown Title' }}">

                                <div class="p-4">
                                    <!-- Film Title -->
                                    <h5 class="text-lg font-bold text-yellow-400 mb-2">
                                        {{ $film->title ?? 'Untitled' }}
                                    </h5>

                                    <!-- Film Rating -->
                                    <p class="text-sm mb-1">
                                        <span class="text-yellow-400">&#9733;</span> {{ $film->rating ?? 'N/A' }}
                                    </p>

                                    <!-- Film Genre -->
                                    <p class="text-sm text-blue-400">
                                        Genre: {{ $film->genre ?? 'Unknown Genre' }}
                                    </p>

                                    <!-- Hybrid Score -->
                                    <p class="text-sm text-gray-300">
                                        Hybrid Score: <strong>{{ number_format($hybridScores[$film->id], 2) }}</strong>
                                    </p>

                                    <!-- Film Description -->
                                    <p class="text-sm text-gray-400 mt-2">
                                        {{ Str::limit($film->description ?? 'No description available.', 100) }}
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
</body>
</html>
@endsection
