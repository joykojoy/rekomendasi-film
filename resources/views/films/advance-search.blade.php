<link rel="stylesheet" href="{{ asset('css/advance-search.css') }}">

<div class="advance-search-page">
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

                <!-- Filter Group: Ditampilkan dalam satu baris -->
                <div class="filter-group">
                    <!-- Filter by Genre -->
                    <div class="form-group">
                        <label for="genre">Filter by Genre</label>
                        <select id="genre" name="genre">
                            <option value="">Pilih Genre</option>
                            @foreach ($genres as $genre)
                                <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                                    {{ $genre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Sort by Update -->
                    <div class="form-group">
                        <label for="sort_by_update">Sort by update</label>
                        <select id="sort_by_update" name="sort_by_update">
                            <option value="">Pilih</option>
                            <option value="desc" {{ request('sort_by_update') == 'desc' ? 'selected' : '' }}>Terbaru</option>
                            <option value="asc" {{ request('sort_by_update') == 'asc' ? 'selected' : '' }}>Terlama</option>
                        </select>
                    </div>
                    <!-- Sort by Rating -->
                    <div class="form-group">
                        <label for="sort_by_rating">Sort by rating</label>
                        <select id="sort_by_rating" name="sort_by_rating">
                            <option value="">Pilih</option>
                            <option value="desc" {{ request('sort_by_rating') == 'desc' ? 'selected' : '' }}>Tertinggi</option>
                            <option value="asc" {{ request('sort_by_rating') == 'asc' ? 'selected' : '' }}>Terendah</option>
                        </select>
                    </div>
                    <!-- Sort by Genre -->
                    <div class="form-group">
                        <label for="sort_by_genre">Sort by Genre</label>
                        <select id="sort_by_genre" name="sort_by_genre">
                            <option value="">Pilih</option>
                            <option value="asc" {{ request('sort_by_genre') == 'asc' ? 'selected' : '' }}>A-Z</option>
                            <option value="desc" {{ request('sort_by_genre') == 'desc' ? 'selected' : '' }}>Z-A</option>
                        </select>
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
                    @if (!$films->onFirstPage())
                        <a class="pagination-link" href="{{ $films->previousPageUrl() }}">«</a>
                    @endif

                    @foreach ($films->getUrlRange(1, $films->lastPage()) as $page => $url)
                        @if ($page == $films->currentPage())
                            <span class="pagination-link active">{{ $page }}</span>
                        @else
                            <a class="pagination-link" href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

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

<style>
    .back-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background: #d3d3d3; /* abu-abu cerah */
        color: #333;
        border: none;
        font-size: 24px;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .back-button:hover {
        background: #c0c0c0;
    }
</style>
