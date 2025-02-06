@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <!-- Bagian Gambar dan Rating -->
            <div class="col-md-4">
                @if ($film->gambar)
                    <div>
                        <img src="{{ asset('storage/' . $film->gambar) }}" alt="{{ $film->title }}" class="img-fluid mb-3">
                    </div>
                @else
                    <div class="no-image-placeholder">
                        <span>No image available</span>
                    </div>
                @endif
                <div class="rating-box">
                    <p><strong>Rating:</strong> <span class="rating-value">{{ number_format($film->rating, 1) }}</span> ⭐</p>
                </div>
            </div>

            <!-- Bagian Detail Film -->
            <div class="col-md-8">
                <h1 class="film-title">{{ $film->title }}</h1>
                <p><strong>Genre:</strong> {{ $film->genre }}</p>
                <p><strong>Sinopsis:</strong></p>
                <p class="text-justify synopsis">{{ $film->sinopsis }}</p>
                <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back to Previous Page</a>
                    @auth
                        @if(auth()->user()->isAdmin ?? false)
                            <a href="{{ route('films.edit', $film->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        @auth
            <div class="mt-6">
                <h3 class="mb-4 text-lg font-semibold text-gray-8000">Leave a Comment</h3>
                <form id="ratingForm" method="POST" action="{{ route('films.rating', $film->id) }}" class="space-y-4">
                    @csrf
                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-8000">Rating</label>
                        <select name="rating" id="rating" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-black" required>
                            <option value="">Select a Rating</option>
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}" class="text-black">{{ $i }} ⭐</option>
                            @endfor
                        </select>
                        <div class="mt-1 text-white text-red-500">Please select a rating.</div>
                    </div>

                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-8000">Comment</label>
                        <textarea name="comment" id="comment" rows="3" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm text-black" placeholder="Write your comment..." required minlength="3"></textarea>
                        <div class="mt-1 text-xs text-red-500">Please enter a comment (minimum 3 characters).</div>
                    </div>

                    <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded-md shadow hover:bg-blue-500">
                        Submit Comment
                    </button>
                </form>
            </div>
        @else
            <div class="mt-6 p-4 bg-blue-100 rounded-md">
                <p class="text-sm text-blue-700">
                    Please <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:underline">login</a> to leave a comment.
                </p>
            </div>
        @endauth
        <!-- Bagian Komentar -->
        <div class="mt-5">
            <h3 class="mb-3 text-lg font-semibold text-gray-8000">Comments</h3>
            <div id="comments-container">
                @foreach ($comments as $comment)
                    <div class="mb-4 p-4 bg-white rounded-2xl shadow-md">
                        <div class="flex justify-between items-center mb-2">
                            <div class="flex items-center space-x-3">
                                <h5 class="text-base font-medium text-gray-900">{{ $comment->user->name }}</h5>
                            </div>
                            <span class="px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full">
                                <span class="text-black">{{ $comment->rating }}</span> ⭐
                            </span>
                        </div>
                        <p class="text-gray-700 text-sm">{{ $comment->comment }}</p>
                        <small class="text-gray-500 text-xs">Posted on {{ $comment->created_at->format('Y M d H:i') }}</small>
                    </div>
                @endforeach
            </div>
        </div>
</div>
        <!-- Form Komentar -->
       
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#ratingForm').on('submit', function(e) {
                e.preventDefault();
                
                const form = $(this);
                form.addClass('was-validated');
                
                if (!form[0].checkValidity()) {
                    return;
                }

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: form.serialize(),
                    beforeSend: function() {
                        form.find('button[type="submit"]').prop('disabled', true).html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submitting...'
                        );
                    },
                    success: function(response) {
                        // Tambahkan komentar baru ke container
                        const newComment = createCommentHTML(response.comment);
                        $('#comments-container').prepend(newComment);
                        
                        // Reset form
                        form[0].reset();
                        form.removeClass('was-validated');
                        
                        // Tampilkan pesan sukses
                        alert(response.success);
                    },
                    error: function(xhr) {
                        let errorMessage = 'Something went wrong. Please try again.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        alert(errorMessage);
                    },
                    complete: function() {
                        form.find('button[type="submit"]').prop('disabled', false).text('Submit Comment');
                    }
                });
            });
            
            function createCommentHTML(comment) {
                return `
                    <div class="card mb-3 shadow-sm border-light rounded comment-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="card-title">${comment.user.name}</h5>
                                <span class="badge badge-warning p-2">${comment.rating} ⭐</span>
                            </div>
                            <p class="card-text">${comment.comment}</p>
                            <small class="text-muted">Just now</small>
                        </div>
                    </div>
                `;
            }
        });
    </script>
@endsection

@section('styles')
    <style>
        .img-fluid {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .no-image-placeholder {
            width: 100%;
            height: 300px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
        }

        .form-control {
            max-width: 100%;
            background-color: #fff;
            border: 1px solid #ced4da;
        }

        .custom-textarea {
            min-height: 120px;
            resize: vertical;
        }

        .comment-card {
            background-color: #2d2d2d;
            border: none;
            transition: transform 0.2s;
        }

        .comment-card:hover {
            transform: translateY(-2px);
        }

        .comment-card .card-title {
            color: #fff;
            margin-bottom: 0;
        }

        .comment-card .card-text {
            color: #e0e0e0;
        }

        .comment-card .text-muted {
            color: #adb5bd !important;
        }

        .film-title {
            color: #333;
            margin-bottom: 1.5rem;
        }

        .synopsis {
            line-height: 1.6;
            color: #555;
        }

        .rating-box {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 1rem;
        }

        .rating-value {
            font-size: 1.2rem;
            color: #ffc107;
        }

        .badge-warning {
            background-color: #ffc107;
            color: #000;
        }

        /* Form validation styles */
        .was-validated .form-control:invalid {
            border-color: #dc3545;
        }

        .was-validated .form-control:valid {
            border-color: #28a745;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .film-title {
                font-size: 1.8rem;
            }
        }
    </style>
@endsection