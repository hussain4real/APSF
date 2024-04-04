<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'chats';

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'participants',
            'chat_id',
            'user_id'
        )->using(Participant::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function getLatestMessageAttribute(): Model|HasMany|null
    {
        return $this->messages()
            ->latest()
            ->first();
    }

    public function isUnreadForUser(): bool
    {
        return $this->messages()
            ->whereNull('last_read')
            ->where('user_id', '<>', auth()->id())
            ->exists();
    }

    public function markAsReadForUser($user): void
    {
        $this->messages()
            ->whereNull('last_read')
            ->where('user_id', '<>', $user->id)
            ->update(['last_read' => now()]);
    }

    public function unreadCount(): Attribute
    {
        return Attribute::make(
            get: fn (): int => $this->messages()
                ->whereNull('last_read')
                ->where('user_id', '!=', auth()->id())
                ->count(),
        );
    }
}
