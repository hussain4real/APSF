<?php

namespace App\Models;

use App\TrainingStatus;
use App\TrainingType;
use App\TraininingMode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TrainingProgram extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, SoftDeletes;

    protected $guarded = [];

    protected $with = ['trainingProvider'];

    protected function casts(): array
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
            'status' => TrainingStatus::class,
            'type' => TrainingType::class,
            'mode_of_delivery' => TraininingMode::class,
        ];
    }

    public function trainingProvider(): BelongsTo
    {
        return $this->belongsTo(TrainingProvider::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'training_program_users')
            ->using(TrainingProgramUser::class)
            ->withPivot('status', 'enrolled_at')
            ->withTimestamps();
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('preview')
            ->fit(fit: Fit::Contain)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('banner')
            ->singleFile();
    }
}
