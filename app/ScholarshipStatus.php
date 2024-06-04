<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ScholarshipStatus: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case UPCOMING = 'upcoming';
    case ONGOING = 'ongoing';
    case CLOSED = 'closed';
    case SUSPENDED = 'suspended';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::UPCOMING => 'info',
            self::ONGOING => 'primary',
            self::CLOSED => 'warning',
            self::SUSPENDED => 'danger',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::UPCOMING => 'Upcoming',
            self::ONGOING => 'Ongoing',
            self::CLOSED => 'Closed',
            self::SUSPENDED => 'Suspended',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::UPCOMING => 'heroicon-o-clock',
            self::ONGOING => 'heroicon-o-check-circle',
            self::CLOSED => 'heroicon-o-archive-box-x-mark',
            self::SUSPENDED => 'heroicon-o-x-mark',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
