<?php

namespace App\Models;

use App\EventType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Translatable\HasTranslations;

class Event extends Model implements HasMedia
{
    use HasFactory, HasTranslations, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'event_start_date' => 'datetime',
            'event_end_date' => 'datetime',
            'type' => EventType::class,
        ];
    }

    public $translatable =
        [
            'event_title',
            'event_slug',
            'event_description',
            'event_excerpt',
            'event_location',
        ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('events_media');
    }

    //event_start_date getter with human readable format
    public function getEventDateAttribute($value)
    {
        // Convert the database value to a Carbon instance
        $eventStartDate = Carbon::parse($value);

        // Format the date in a human-readable format including "AM" or "PM"
        $formattedDate = $eventStartDate->isoFormat('Do MMMM YYYY, h:mm A');

        return $formattedDate;
    }
}
