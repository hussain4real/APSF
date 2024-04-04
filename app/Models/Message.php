<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $touches = ['chat'];

    public function getBodyAttribute($value): ?string
    {
        if ($this->trashed()) {
            return auth()->id() === $this->sender->id ? 'You deleted this message' : "{$this->sender->first_name} deleted this message";
        }

        if ($value === null) {
            return null;
        }

        return $value;
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
