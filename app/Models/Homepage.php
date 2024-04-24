<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Homepage extends Model
{
    use HasFactory, HasTranslations;

    protected $guarded = [];

    public function casts()
    {
        return [
            //
        ];
    }

    public $translatable = [
        'hero_title',
        'hero_subtitle',
        'hero_description_one',
        'hero_description_two',
        'mission_title',
        'mission_description',
        'vision_title',
        'vision_description',
        'values_heading',
        'value_title_one',
        'value_description_one',
        'value_title_two',
        'value_description_two',
        'value_title_three',
        'value_description_three',
        'value_title_four',
        'value_description_four',
        'value_title_five',
        'value_description_five',
        'value_title_six',
        'value_description_six',
        'chairman_message_title',
        'chairman_message_one',
        'chairman_message_two',
        'chairman_message_three',
        'partners_title',
        'partners_description',
        'member_action_text',
        'member_action_url',
        'member_description',
        'newsletter_title',
        'newsletter_description',
    ];
}
