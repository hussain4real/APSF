<?php

namespace App\Models;

use App\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingProvider extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'institution_name',
        'institution_type',
        'institution_address',
        'institution_email',
        'institution_phone',
        'institution_website',
        'institution_logo',
        'institution_description',
        'license',
        'license_expiry_date',
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
            'license_expiry_date' => 'datetime',
            'status' => Status::class,
        ];
    }

    /**
     * Get the user that owns the training provider.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
