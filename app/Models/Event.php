<?php

namespace App\Models;

use App\EventType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];

    public function casts()
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
}
