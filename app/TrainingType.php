<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TrainingType: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case COURSE = 'course';
    case CERTIFICATION = 'certification';
    case WORKSHOP = 'workshop';
    case SEMINAR = 'seminar';
    case CONFERENCE = 'conference';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::COURSE => 'primary',
            self::CERTIFICATION => 'success',
            self::WORKSHOP => 'danger',
            self::SEMINAR => 'gray',
            self::CONFERENCE => 'warning',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::COURSE => 'Training Course',
            self::CERTIFICATION => 'Certification Program',
            self::WORKSHOP => 'Workshop Program',
            self::SEMINAR => 'Seminar Program',
            self::CONFERENCE => 'Conference Program',

        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::COURSE => 'heroicon-o-book-open',
            self::CERTIFICATION => 'heroicon-o-badge-check',
            self::WORKSHOP => 'heroicon-o-cog',
            self::SEMINAR => 'heroicon-o-clipboard-check',
            self::CONFERENCE => 'heroicon-o-calendar',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
