@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Comments by {{ $user->name }}</h1>
    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to User List</a>

    <div class="card">
        <div class="card-body">
            @if ($user->ratings->isEmpty())
                <p class="text-center">No comments found for this user.</p>
            @else
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Film Title</th>
                            <th>Rating</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->ratings as $rating)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rating->film->title ?? 'Unknown' }}</td>
                                <td>{{ $rating->rating }}</td>
                                <td>{{ $rating->comment }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
