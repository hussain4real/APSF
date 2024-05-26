<?php

namespace App\Models;

use App\TrainingEnrollmentStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TrainingProgramUser extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    protected function casts(): array
    {
        return [
            'status' => TrainingEnrollmentStatus::class,
            'enrolled_at' => 'datetime',
        ];
    }
}
