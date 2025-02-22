@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/advance-search.css') }}">

<div class="advance-search-page bg-dark"> <!-- Added bg-dark class -->
    <!-- Tombol Back -->
    <button class="back-button" onclick="history.back()">&#x21A9;</button>
    
    <!-- Bagian Advanced Search Form -->
    <section class="section search-section">
        <div class="search-container">
            <h3 class="search-title">Advance Search</h3>
            <form method="GET" action="{{ route('films.advance-search') }}">
                @csrf

                <!-- Input Search -->
                <div class="form-group">
                    <label for="search">Search</label>
                    <input 
                        type="text" 
                        id="search" 
                        name="search" 
                        placeholder="Enter film title or keyword"
                        value="{{ request('search') }}">
                </div>

                <!-- Filter Group -->
                <div class="filter-group">
                    <!-- Genre Related Filters -->
                    <div class="genre-filters">
                        <!-- Primary Genre -->
                        <div class="form-group">
                            <label for="genre1">Primary Genre</label>
                            <select id="genre1" name="genre1">
                                <option value="">Select Genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre1') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Secondary Genre -->
                        <div class="form-group">
                            <label for="genre2">Secondary Genre</label>
                            <select id="genre2" name="genre2">
                                <option value="">Select Genre</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre }}" {{ request('genre2') == $genre ? 'selected' : '' }}>
                                        {{ $genre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div class="sort-options">
                        <div class="sort-group">
                            <!-- Update Sort -->
                            <div class="form-group">
                                <label for="sort_by_update">Update</label>
                                <select id="sort_by_update" name="sort_by_update" class="sort-select">
                                    <option value="">Select Order</option>
                                    <option value="desc" {{ request('sort_by_update') == 'desc' ? 'selected' : '' }}>Newest First</option>
                                    <option value="asc" {{ request('sort_by_update') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                                </select>
                            </div>

                            <!-- Rating Sort -->
                            <div class="form-group">
                                <label for="sort_by_rating">Rating</label>
                                <select id="sort_by_rating" name="sort_by_rating" class="sort-select">
                                    <option value="">Select Order</option>
                                    <option value="desc" {{ request('sort_by_rating') == 'desc' ? 'selected' : '' }}>Highest First</option>
                                    <option value="asc" {{ request('sort_by_rating') == 'asc' ? 'selected' : '' }}>Lowest First</option>
                                </select>
                            </div>

                            <!-- Hybrid Rating Sort -->
                            <div class="form-group">
                                <label for="sort_by_hybrid">Hybrid Rating</label>
                                <select id="sort_by_hybrid" name="sort_by_hybrid" class="sort-select">
                                    <option value="">Select Order</option>
                                    <option value="desc" {{ request('sort_by_hybrid') == 'desc' ? 'selected' : '' }}>Highest First</option>
                                    <option value="asc" {{ request('sort_by_hybrid') == 'asc' ? 'selected' : '' }}>Lowest First</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Bagian Hasil Pencarian (Grid Card) -->
        @if ($films->count() > 0)
            <h3 class="search-result-title">Search Results</h3>
            <div class="search-results-grid">
                @foreach ($films as $film)
                    <div class="search-result-card" onclick="window.location='{{ route('films.display', $film->id) }}'">
                        <!-- Poster film -->
                        <img 
                            src="{{ asset('storage/' . $film->gambar) }}" 
                            alt="{{ $film->title }}">
                        <!-- Keterangan film (tersembunyi, tampil saat hover) -->
                        <div class="result-info">
                            <h4 class="title">{{ $film->title }}</h4>
                            <p class="genre">{{ $film->genre }}</p>
                            <p class="rating">Rating: {{ $film->rating }}</p>
                            <p class="description">{{ $film->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Custom Pagination -->
            @if ($films->hasPages())
                <div class="search-pagination">
                    <!-- Previous Page Link -->
                    @if (!$films->onFirstPage())
                        <a class="pagination-link" href="{{ $films->previousPageUrl() }}">«</a>
                    @endif

                    @php
                        $start = max($films->currentPage() - 5, 1);
                        $end = min($films->currentPage() + 5, $films->lastPage());
                    @endphp

                    <!-- Show First Page if not in range -->
                    @if($start > 1)
                        <a class="pagination-link" href="{{ $films->url(1) }}">1</a>
                        @if($start > 2)
                            <span class="pagination-ellipsis">...</span>
                        @endif
                    @endif

                    <!-- Page Links -->
                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $films->currentPage())
                            <span class="pagination-link active">{{ $i }}</span>
                        @else
                            <a class="pagination-link" href="{{ $films->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    <!-- Show Last Page if not in range -->
                    @if($end < $films->lastPage())
                        @if($end < $films->lastPage() - 1)
                            <span class="pagination-ellipsis">...</span>
                        @endif
                        <a class="pagination-link" href="{{ $films->url($films->lastPage()) }}">{{ $films->lastPage() }}</a>
                    @endif

                    <!-- Next Page Link -->
                    @if ($films->hasMorePages())
                        <a class="pagination-link" href="{{ $films->nextPageUrl() }}">»</a>
                    @endif
                </div>
            @endif
        @else
            <p class="no-results">No films found.</p>
        @endif
    </section>
</div>
@endsection

<style>
    /* Reset default margin dan padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #212529;
        min-height: 100vh;
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .advance-search-page {
        background-color: #212529;
        min-height: 100vh;
        width: 100%;
        margin: 0;  /* Hapus margin default */
        padding: 20px;  /* Tambah padding untuk konten */
        overflow-x: hidden;  /* Mencegah scroll horizontal */
    }

    .search-container {
        background-color: #343a40;
        width: 100%;
        max-width: 1200px;  /* Atau sesuai kebutuhan */
        margin: 0 auto;
        padding: 20px;
        border-radius: 8px;
    }

    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #343a40; /* Changed to dark theme color */
        color: #ffc107; /* Changed to yellow for visibility */
        border: none;
        font-size: 24px;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .back-button:hover {
        background: #495057; /* Slightly lighter dark on hover */
    }

    /* Add background color for the page */
    .advance-search-page {
        background-color: #212529; /* Dark background */
        min-height: 100vh;
    }

    /* Add background for search container */
    .search-container {
        background-color: #343a40;
    }

    /* Add background for search result cards */
    .search-result-card {
        background-color: #343a40;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const genre1Select = document.getElementById('genre1');
    const genre2Select = document.getElementById('genre2');

    function updateGenreOptions() {
        const genre1Value = genre1Select.value;
        const genre2Value = genre2Select.value;

        // Enable all options first
        Array.from(genre1Select.options).forEach(opt => opt.disabled = false);
        Array.from(genre2Select.options).forEach(opt => opt.disabled = false);

        // Disable selected options in the other select
        if (genre1Value) {
            const option = genre2Select.querySelector(`option[value="${genre1Value}"]`);
            if (option) option.disabled = true;
        }
        if (genre2Value) {
            const option = genre1Select.querySelector(`option[value="${genre2Value}"]`);
            if (option) option.disabled = true;
        }
    }

    genre1Select.addEventListener('change', updateGenreOptions);
    genre2Select.addEventListener('change', updateGenreOptions);
    
    // Initial setup
    updateGenreOptions();
});
</script>
