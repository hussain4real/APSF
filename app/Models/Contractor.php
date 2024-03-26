<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contractor extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', // 'user_id' is the foreign key that links the contractor to the user
        'business_name',
        'business_type',
        'business_address',
        'business_phone',
        'business_email',
        'business_website',
        'business_logo',
        'business_description',
        'business_license',
        'business_license_exp',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'business_license_exp' => 'date',
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the contractor.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
