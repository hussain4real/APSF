<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Teacher extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
            // 'status' => Status::class,
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
     * BelongsTo School
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    /**
     * Get all the teacher's reviews.
     */
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Get the sum of all the teacher's ratings.
     */
    public function getRatingSumAttribute(): int
    {
        return $this->reviews->sum('rating');
    }

    /**
     * Get Teacher Reviews
     */
    public function getReviewsAttribute()
    {
        return $this->reviews()->get();
    }

    /**
     * Get the average rating of the teacher.
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

    //spatie media library
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->fit(Fit::Contain, 300, 300)
            ->performOnCollections('cv')
            // ->width(300)
            // ->height(300)
            ->pdfPageNumber(1)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cv');
    }
}
