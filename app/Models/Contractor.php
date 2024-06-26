<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
    ];

    protected $with = [
        'user',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'business_license_exp' => 'date',
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the contractor.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the contractor's reviews.
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get the sum of all the contractor's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        return $this->reviews->sum('rating');
    }

    /**
     * Get Contractor Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviews()->get();
    }

    /**
     * Get the average rating of the contractor.
     */
    public function getRatingAttribute(): float
    {
        return $this->reviews?->avg('rating') ?? 0.0;
        //        if ($this->reviews->count() > 0) {
        //            return floatval(number_format($this->rating_sum / $this->reviews->count(), 2));
        //        }
        //
        //        return 0.0;
    }
}
