<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Founder extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
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
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the founder.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the founder's reviews.
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get the sum of all the founder's ratings.
     */
    public function getRatingSumAttribute()
    {
        return $this->reviews->sum('rating');
    }

    /**
     * Get Founder Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviews()->get();
    }

    /**
     * Get the average rating of the founder.
     */
    public function getAverageRatingAttribute()
    {
        return $this->reviews->avg('rating');
    }
}
