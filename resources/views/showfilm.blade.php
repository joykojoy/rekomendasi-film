@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Bagian Gambar dan Rating -->
            <div class="col-md-4">
                @if ($film->gambar)
                    <div>
                        <!-- Gambar dengan img-fluid untuk responsivitas -->
                        <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->title }}" class="img-fluid mb-3">
                    </div>
                @else
                    <p>No image available</p>
                @endif
                <p><strong>Rating:</strong> {{ $film->rating }}</p>
            </div>

            <!-- Bagian Detail Film -->
            <div class="col-md-8">
                <h1>{{ $film->title }}</h1>
                <p><strong>Genre:</strong> {{ $film->genre }}</p>
                <p><strong>Sinopsis:</strong></p>
                <p class="text-justify">{{ $film->sinopsis }}</p>
                <div class="mt-4">
                    <a href="{{ route('films.index') }}" class="btn btn-secondary">Back to Film List</a>
                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                </div>
            </div>
        </div>

        <!-- Bagian Komentar -->
        <div class="mt-5">
            <h3 class="mb-3">Comments</h3>
            @foreach ($comments as $comment)
                <div class="card mb-3 shadow-sm border-light rounded comment-card">
                    <div class="card-body">
                        <!-- Nama Pengguna dan Rating -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">{{ $comment->user->name }}</h5>
                            <span class="badge badge-warning p-2 text-dark">{{ $comment->rating }} &#9733;</span>
                        </div>

                        <!-- Komentar Pengguna -->
                        <p class="card-text">{{ $comment->comment }}</p>

                        <!-- Tanggal dan Waktu Komentar -->
                        <small class="text-muted">Posted on {{ $comment->created_at->format('d-m-Y H:i') }}</small>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Form Komentar -->
        <div class="mt-4">
            <h3 class="mb-4">Leave a Comment</h3>
            <form action="{{ route('films.rating', $film->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="">Select a Rating</option>
                        <option value="1">1 &#9733;</option>
                        <option value="2">2 &#9733;</option>
                        <option value="3">3 &#9733;</option>
                        <option value="4">4 &#9733;</option>
                        <option value="5">5 &#9733;</option>
                        <option value="6">6 &#9733;</option>
                        <option value="7">7 &#9733;</option>
                        <option value="8">8 &#9733;</option>
                        <option value="9">9 &#9733;</option>
                        <option value="10">10 &#9733;</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea name="comment" id="comment" rows="3" class="form-control custom-textarea" placeholder="Write your comment..." required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        /* Pastikan gambar menggunakan width yang responsif */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        /* Custom styling untuk form komentar */
        .form-control {
            max-width: 500px;
            margin: 0 auto;
        }

        .custom-textarea {
            min-height: 100px;
            font-size: 14px;
        }

        /* Ubah warna teks dalam textarea */
        .form-control.custom-textarea {
            color: #333;
        }

        /* Perbaiki warna teks dalam textarea */
        .form-label {
            color: #555;
        }

        /* Latar belakang hitam pada komentar */
        .comment-card {
            background-color: #333; /* Warna hitam */
            color: #fff; /* Warna teks putih */
        }

        /* Agar tanggal dan waktu komentar tetap kontras */
        .comment-card small {
            color: #bbb; /* Warna teks abu-abu untuk tanggal */
        }
    </style>
@endsection
