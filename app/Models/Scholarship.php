<?php

namespace App\Models;

use App\Filament\Clusters\Resources\Resources\ScholarshipResource;
use App\ScholarshipStatus;
use App\ScholarshipType;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Scholarship extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'scholarships';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'status' => ScholarshipStatus::class,
            'type' => ScholarshipType::class,

        ];
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('scholarship_images');
    }

    public function getUrl()
    {
        return ScholarshipResource::getUrl('view', ['record' => $this->id]);
    }
}
