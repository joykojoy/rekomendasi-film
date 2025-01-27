<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HybridFill extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hybridfill';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'film_id',
        'score',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'score' => 'float',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the film associated with the hybrid fill.
     *
     * @return BelongsTo
     */
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'film_id');
    }

    /**
     * Get the user associated with the hybrid fill.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Scope a query to find recommendations for a specific user.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}