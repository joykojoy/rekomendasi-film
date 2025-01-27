<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'user_id',
        'film_id',
        'rating',
        'comment',
    ];

    /**
     * Many-to-One relationship with Film.
     */
    public function film()
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    /**
     * Many-to-One relationship with User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
