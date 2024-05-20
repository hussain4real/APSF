<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class AboutPage extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];

    public function casts()
    {
        return [
            //
        ];
    }

    public $translatable =
        [
            'hero_title',
            'hero_subtitle',
            'hero_description_one',
            'hero_description_two',
            'hero_description_three',
            'hero_description_four',
            'objective_heading',
            'objective_title_one',
            'objective_description_one',
            'objective_title_two',
            'objective_description_two',
            'objective_title_three',
            'objective_description_three',
            'objective_title_four',
            'objective_description_four',
            'objective_title_five',
            'objective_description_five',
            'objective_title_six',
            'objective_description_six',
            'objective_title_seven',
            'objective_description_seven',
            'objective_title_eight',
            'objective_description_eight',
            'objective_title_nine',
            'objective_description_nine',
            'objective_title_ten',
            'objective_description_ten',
            'objective_title_eleven',
            'objective_description_eleven',
            'objective_title_twelve',
            'objective_description_twelve',
        ];
}
