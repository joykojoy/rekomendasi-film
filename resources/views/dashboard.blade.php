@extends('layout')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
<div class="container">
    <!-- Top Picks Section -->
    <h2 class="text-warning mb-4">What to Watch</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Top Picks</h3>
        <a href="{{ route('top-picks') }}" class="btn btn-sm btn-outline-primary">Get more recommendations &rarr;</a>
    </div>
    <div class="row">
        @foreach ($topPicks as $film)
            <div class="col-md-2 mb-4">
                <a href="{{ route('films.display', $film->id) }}" class="text-decoration-none">
                    <div class="card bg-dark text-white border-0 shadow">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $film->gambar) }}" class="card-img-top img-fluid rounded" alt="{{ $film->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $film->title }}</h5>
                            <p class="card-text mb-2">
                                <span class="text-warning">&#9733; {{ $film->rating }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Recommendations Section -->
    <h2 class="text-warning mb-4">Recommended for You</h2>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-white">Recommendations</h3>
        <a href="{{ route('recommendations') }}" class="btn btn-sm btn-outline-primary">Get more recommendations &rarr;</a>
    </div>
    <div class="row">
        @foreach ($recommendations as $film)
            <div class="col-md-2 mb-4">
                <a href="{{ route('films.display', $film->id) }}" class="text-decoration-none">
                    <div class="card bg-dark text-white border-0 shadow">
                        <div class="image-container">
                            <img src="{{ asset('storage/' . $film->gambar) }}" class="card-img-top img-fluid rounded" alt="{{ $film->title }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-truncate">{{ $film->title }}</h5>
                            <p class="card-text mb-2">
                                <span class="text-warning">&#9733; Hybrid Score: {{ number_format($film->hybrid_score, 2) }}</span>
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<style>
    
</style>
@endsection
