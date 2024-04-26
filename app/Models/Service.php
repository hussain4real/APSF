<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Service extends Model
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
            'service_side_title',
            'service_title',
            'service_description',
            'service_tag_one',
            'service_tag_two',
            'service_tag_three',
            'service_tag_four',
            'service_tag_five',
            //            'service_side_title_two',
            //            'service_title_two',
            //            'service_description_two',
            //            'service_title_two_tag_one',
            //            'service_title_two_tag_two',
            //            'service_title_two_tag_three',
            //            'service_title_two_tag_four',
            //            'service_title_two_tag_five',
            //            'service_side_title_three',
            //            'service_title_three',
            //            'service_description_three',
            //            'service_title_three_tag_one',
            //            'service_title_three_tag_two',
            //            'service_title_three_tag_three',
            //            'service_title_three_tag_four',
            //            'service_title_three_tag_five',
            //            'service_side_title_four',
            //            'service_title_four',
            //            'service_description_four',
            //            'service_title_four_tag_one',
            //            'service_title_four_tag_two',
            //            'service_title_four_tag_three',
            //            'service_title_four_tag_four',
            //            'service_title_four_tag_five',
            //            'service_side_title_five',
            //            'service_title_five',
            //            'service_description_five',
            //            'service_title_five_tag_one',
            //            'service_title_five_tag_two',
            //            'service_title_five_tag_three',
            //            'service_title_five_tag_four',
            //            'service_title_five_tag_five',
            //            'service_side_title_six',
            //            'service_title_six',
            //            'service_description_six',
            //            'service_title_six_tag_one',
            //            'service_title_six_tag_two',
            //            'service_title_six_tag_three',
            //            'service_title_six_tag_four',
            //            'service_title_six_tag_five',
            //            'scholarship_title',
            //            'scholarship_description',
            //            'scholarship_action_text',
        ];
}
