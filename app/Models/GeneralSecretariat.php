<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class GeneralSecretariat extends Model
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
            'name',
            'position',
            'description',
        ];
}
