<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Paddle\Billable;

class Student extends Model
{
    use Billable, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'school_name',
        'current_grade',
        'address',
        'date_of_birth',
        'country',
        'phone',
        'status',
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
            'date_of_birth' => 'date',
            'status' => Status::class,
        ];
    }

    /**
     * BelongsTo User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all the student's reviews.
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get the sum of all the student's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        return $this->reviews->sum('rating');
    }

    /**
     * Get Student Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviews()->get();
    }

    /**
     * Get the average rating of the student.
     */
    public function getRatingAttribute(): float
    {
        return $this->reviews->avg('rating');
        //        if ($this->reviews->count() > 0) {
        //            return floatval(number_format($this->rating_sum / $this->reviews->count(), 2));
        //        }
        //
        //        return 0.0;
    }
}
