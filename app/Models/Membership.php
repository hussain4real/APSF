<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Membership extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'benefits' => 'array',
        ];
    }

    public array $translatable =
        [
            'name',
            'slug',
            'price',
            'currency',
            'duration',
            'price_note',
            'benefits',
            'action',
        ];
}
