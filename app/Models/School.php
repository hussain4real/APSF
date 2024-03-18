<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable=[
        'user_id',
        'name',
        'slug',
        'description',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'phone',
        'email',
        'website',
        'date_founded',
        'motto',
        'logo_path',
        'cover_path',
        'number_of_students',
        'number_of_teachers',
        'type',
        'status'
    ];

    /**
     * BelongsTo User
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
