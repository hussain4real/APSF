<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class PublicVote extends Model
{
    use HasFactory, HasTranslations, SoftDeletes;

    protected $guarded = [];

    public function casts(): array
    {
        return [
            'option1' => 'integer',
            'option2' => 'integer',
            'option3' => 'integer',
        ];
    }

    public array $translatable =
        [
            'question',
            'option1',
            'option2',
            'option3',
            'ip_address',
        ];
}
