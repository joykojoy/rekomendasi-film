<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Picks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 10px;
            overflow: hidden;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            font-size: 1rem;
            font-weight: bold;
        }
        .btn-outline-primary, .btn-outline-light {
            border-radius: 5px;
        }
        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }
        .btn-outline-light:hover {
            background-color: #fff;
            color: #121212;
        }
        .sidebar {
            background-color: #1f1f1f;
            min-height: 100vh;
            padding: 1rem;
            position: sticky;
            top: 0;
        }
        .sidebar a {
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            padding: 0.5rem 0;
            display: block;
            transition: color 0.2s;
        }
        .sidebar a:hover {
            color: #007bff;
        }
        .content {
            margin-left: 250px;
        }
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }
            .sidebar {
                position: static;
                min-height: auto;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-warning">Menu</h4>
        <a href="#">Home</a>
        <a href="#">Top Picks</a>
        <a href="#">Watchlist</a>
        <a href="#">Genres</a>
        <a href="#">Profile</a>
    </div>

    <!-- Main Content -->
    <div class="content container py-5">
        <h2 class="text-warning mb-4 text-center">Top Picks</h2>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
            @foreach ($films as $film)
                <div class="col">
                    <div class="card bg-dark text-white h-100 border-0 shadow-sm">
                        <!-- Film Image -->
                        <img src="{{ $film->gambar ? asset('storage/' . $film->gambar) : 'https://via.placeholder.com/200x300' }}" 
                             class="card-img-top" 
                             alt="{{ $film->title }}">
                        <div class="card-body d-flex flex-column p-3">
                            <!-- Film Title -->
                            <h5 class="card-title text-warning">{{ $film->title }}</h5>
                            <!-- Film Rating -->
                            <p class="card-text mb-3">
                                <span class="text-warning">&#9733; {{ $film->rating ?? 'N/A' }}</span>
                            </p>
                            <!-- Action Buttons -->
                            <a href="#" class="btn btn-sm btn-outline-primary w-100 mb-2">+ Watchlist</a>
                            <a href="#" class="btn btn-sm btn-outline-light w-100">Trailer</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
