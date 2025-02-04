@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New for You</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">
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
                        <div class="bg-gray-800 rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
                            <!-- Image Section -->
                            <div class="w-full h-64 relative">
                                <img src="{{ isset($film->gambar) ? asset('storage/' . $film->gambar) : 'https://via.placeholder.com/300x450' }}" 
                                     class="w-full h-64 object-cover object-center group-hover:scale-105 transition-transform duration-300" 
                                     alt="{{ $film->title ?? 'Unknown Title' }}"
                                     onerror="this.onerror=null; this.src='data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iNDUwIiB2aWV3Qm94PSIwIDAgMzAwIDQ1MCIgZmlsbD0iIzMzMyI+CiAgPHJlY3Qgd2lkdGg9IjMwMCIgaGVpZ2h0PSI0NTAiIGZpbGw9IiMzMzMiLz4KICA8dGV4dCB4PSI1MCUiIHk9IjUwJSIgZm9udC1zaXplPSIxNiIgZm9udC1mYW1pbHk9IkFyaWFsLCBzYW5zLXNlcmlmIiBmaWxsPSIjZmZmIiB0ZXh0LWFuY2hvcj0ibWlkZGxlIj5ObyBJbWFnZTwvdGV4dD4KPC9zdmc+';">
                                <div class="absolute inset-0 flex items-center justify-center bg-gray-700 text-gray-400 text-lg" style="display: none;" id="no-image-{{ $film->id }}">
                                    No Image
                                </div>
                            </div>

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
                                @if(isset($hybridScores[$film->id]))
                                <p class="text-sm text-gray-300">
                                    Recommendation Score: <strong>{{ number_format($hybridScores[$film->id], 2) }}</strong>
                                </p>
                                @endif

                                <!-- Film Description -->
                                <p class="text-sm text-gray-400 mt-2">
                                    {{ Str::limit($film->description ?? 'No description available.', 100) }}
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

    <script>
        // Script untuk menangani kesalahan gambar
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('error', function() {
                const noImageDiv = this.parentElement.querySelector('div[id^="no-image-"]');
                if (noImageDiv) {
                    noImageDiv.style.display = 'flex';
                }
            });
        });
    </script>
</body>
</html>
@endsection