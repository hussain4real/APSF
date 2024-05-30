<?php

namespace App\Models;

use App\TransactionStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'status' => TransactionStatus::class,
        ];
    }

    public function subscription(): HasOne
    {
        return $this->hasOne(Subscription::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDate(): string
    {
        //        return $this->order_date->format('Y-m-d');
        //getting error: Call to a member function format() on string
        return Carbon::parse($this->order_date)->format('Y-m-d');
    }

    public function isPaid(): bool
    {
        return $this->status === TransactionStatus::SUCCESS;
    }
}
