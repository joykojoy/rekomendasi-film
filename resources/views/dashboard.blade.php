@extends('layout')

@section('title', 'Dashboard')

@section('content')
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
    .image-container {
        position: relative;
        width: 100%;
        padding-bottom: 150%; /* 2:3 aspect ratio */
        background-color: #333; /* Fallback background */
    }

    .image-container img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures the image covers the entire container */
    }

    .card-body {
        padding: 1rem;
    }

    /* Custom button styles */
    .custom-btn {
        padding: 0.375rem 1rem; /* Smaller padding to fit better */
        font-size: 0.75rem; /* Slightly smaller font for better alignment */
        border-radius: 20px; /* Rounded corners for a modern look */
        transition: all 0.3s ease-in-out; /* Smooth transition for hover effects */
    }

    /* Button hover effects */
    .custom-btn:hover {
        transform: scale(1.05); /* Slightly enlarge on hover */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Add subtle shadow on hover */
    }

    /* Specific button color changes */
    .btn-outline-primary.custom-btn {
        border-color: #007bff;
        color: #007bff;
    }

    .btn-outline-primary.custom-btn:hover {
        background-color: #007bff;
        color: white;
    }

    .btn-outline-light.custom-btn {
        border-color: #ffffff;
        color: #ffffff;
    }

    .btn-outline-light.custom-btn:hover {
        background-color: #ffffff;
        color: #000000;
    }

    /* Optional: Adjust spacing between card elements for a tidier layout */
    .card-body {
        padding-bottom: 1.25rem;
    }

    /* Remove underline from links */
    a.text-decoration-none {
        color: inherit;
    }
</style>
@endsection
