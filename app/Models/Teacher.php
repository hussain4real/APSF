<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Paddle\Billable;

class Teacher extends Model
{
    use Billable, HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'address',
        'subject_taught',
        'qualification',
        'date_of_birth',
        'previous_experience',
        'country',
        'phone',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'status' => Status::class,
        ];
    }

    /**
     * BelongsTo User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
