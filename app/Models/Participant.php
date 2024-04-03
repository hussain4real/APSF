<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Str;

class Participant extends Pivot
{
    use HasFactory;

    protected $guarded = ['id'];

    public static function fromRawAttributes(Model $parent, $attributes, $table, $exists = false): Participant
    {
        if (! $exists && ! array_key_exists('id', $attributes)) {
            $attributes['id'] = Str::uuid();
        }

        return parent::fromRawAttributes($parent, $attributes, $table, $exists);
    }
}
