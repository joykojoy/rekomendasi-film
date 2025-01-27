@extends('layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-dark">Edit User</h1>

    <a href="{{ route('users.index') }}" class="btn btn-secondary mb-3">Back to User List</a>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="text-dark">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="text-dark">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password" class="text-dark">Password</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation" class="text-dark">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
