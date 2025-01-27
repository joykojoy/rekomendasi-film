<?php
// app/Http/Controllers/UserRatingController.php

namespace App\Http\Controllers;

use App\Models\UserRating;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRatingController extends Controller
{
    public function store(Request $request, Film $film)
    {
        // Validasi input
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        // Simpan rating dan komentar
        $rating = new UserRating();
        $rating->user_id = Auth::id();
        $rating->film_id = $film->id;
        $rating->rating = $validated['rating'];
        $rating->comment = $validated['comment'];
        $rating->save();

        // Redirect kembali ke halaman film dengan pesan sukses
        return redirect()->route('films.show', $film->id)->with('success', 'Your rating and comment have been submitted.');
    }
}
