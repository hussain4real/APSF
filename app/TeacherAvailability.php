<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TeacherAvailability: string implements HasColor,HasLabel,HasIcon,HasDescription
 {
    case FULL_TIME = 'full-time';
    case PART_TIME = 'part-time';
   case CONTRACT = 'contract';
    case TEMPORARY ='temporary';
    case REMOTE = 'remote';
    case UNAVAILABLE = 'unavailable';
    case OTHER = 'other';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FULL_TIME => 'success',
            self::PART_TIME => 'info',
            self::CONTRACT => 'warning',
            self::TEMPORARY => 'danger',
            self::REMOTE => 'primary',
            self::UNAVAILABLE => 'gray',
            self::OTHER => 'secondary',
        };
    }
    public function getdescription(): ?string
    {
        return match ($this) {
            self::FULL_TIME => 'Available for Full Time',
            self::PART_TIME => 'Available for Part Time',
            self::CONTRACT => 'Available for Contract',
            self::TEMPORARY => 'Available for Temporary',
            self::REMOTE => 'Available for Remote',
            self::UNAVAILABLE => 'Unavailable for hire',
            self::OTHER => 'Other',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::FULL_TIME => 'heroicon-o-check-circle',
            self::PART_TIME => 'heroicon-o-signal-slash',
            self::CONTRACT => 'heroicon-o-clock',
            self::TEMPORARY => 'heroicon-o-x-mark',
            self::REMOTE => 'heroicon-o-check-circle',
            self::UNAVAILABLE => 'heroicon-o-signal-slash',
            self::OTHER => 'heroicon-o-clock',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
    
}
