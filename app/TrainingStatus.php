<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TrainingStatus: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case UPCOMING = 'upcoming';
    case ONGOING = 'ongoing';
    case COMPLETED = 'completed';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::UPCOMING => 'primary',
            self::ONGOING => 'warning',
            self::COMPLETED => 'success',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::UPCOMING => 'Upcoming Training',
            self::ONGOING => 'Ongoing Training',
            self::COMPLETED => 'Completed Training',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::UPCOMING => 'heroicon-o-clock',
            self::ONGOING => 'heroicon-o-play',
            self::COMPLETED => 'heroicon-o-check-circle',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}

//
