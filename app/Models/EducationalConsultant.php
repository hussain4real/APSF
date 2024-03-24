<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationalConsultant extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'qualification',
        'years_of_experience',
        'specialization',
        'phone_number',
        'address',
        'city',
        'state',
        'country',
        'status',
    ];

    //cast
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected function casts(): array
    {
        return [
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the educational consultant.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
