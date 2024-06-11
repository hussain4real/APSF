<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentPlan extends Model
{
    use HasFactory;


    public function casts(): array
    {
        return [
            'first_currency' => 'string',
            'second_currency' => 'string',
            'first_currency_amount' => 'string',
            'second_currency_amount' => 'string',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
