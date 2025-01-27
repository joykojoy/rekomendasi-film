@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Film</h1>

        <form action="{{ route('films.update', $film->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $film->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre', $film->genre) }}" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating', $film->rating) }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
                @if ($film->gambar)
                    <img src="{{ asset('storage/' . $film->gambar) }}" width="100" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" class="form-control">{{ old('sinopsis', $film->sinopsis) }}</textarea>
            </div>

            <button type="submit" class="btn btn-warning">Update Film</button>
        </form>
    </div>
@endsection
