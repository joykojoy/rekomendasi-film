@extends('layout')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Film List</h1>
        
        <!-- Formulir Pencarian -->
        <form action="{{ route('films.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search films..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
        
        <a href="{{ route('films.create') }}" class="btn btn-primary mb-3">Add New Film</a>
        
        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Genre</th>
                            <th>Rating</th>
                            <th>Sinopsis</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($films as $film)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $film->title }}</td>
                                <td>{{ $film->genre }}</td>
                                <td>{{ $film->rating }}</td>
                                <td class="text-justify">{{ Str::limit($film->sinopsis, 300) }}</td>
                                <td>
                                    @if($film->gambar)
                                        <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->title }}" width="100">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('films.display', $film->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('films.destroy', $film->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No films found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        {{ $films->appends(request()->input())->links() }} <!-- Pagination links -->
    </div>
@endsection
