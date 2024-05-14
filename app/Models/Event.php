<?php

namespace App\Models;

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
            'event_title' => 'json',
            'event_description' => 'json',
            'event_location' => 'json',
        ];
    }

    public $translatable =
        [
            'event_title',
            'event_description',
            'event_location',
        ];
}
