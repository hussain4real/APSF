<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingProvider extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [
    ];

    protected $with = [
        'user',
    ];

    //cast
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected function casts(): array
    {
        return [
            'license_expiry_date' => 'datetime',
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the training provider.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the training provider's reviews.
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

   

    /**
     * Get the sum of all the training provider's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        return $this->reviews->sum('rating');
    }

    /**
     * Get Training provider Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviews()->get();
    }

    /**
     * Get the average rating of the training provider.
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
