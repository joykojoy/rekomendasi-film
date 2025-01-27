@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Add New Film</h1>

        <form action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="{{ old('genre') }}" required>
            </div>

            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating') }}" required>
            </div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Image</label>
                <input type="file" name="gambar" id="gambar" class="form-control" value="{{ old('gambar') }}">
            </div>

            <div class="mb-3">
                <label for="sinopsis" class="form-label">Sinopsis</label>
                <textarea name="sinopsis" id="sinopsis" class="form-control" required>{{ old('sinopsis') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Add Film</button>
        </form>
    </div>
@endsection
