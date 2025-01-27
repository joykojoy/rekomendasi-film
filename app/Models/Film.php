<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'rating',
        'sinopsis',
        'gambar',
    ];

    // Relationship with UserRating
    public function ratings()
    {
        return $this->hasMany(UserRating::class);
    }
}
