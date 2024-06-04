<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum ScholarshipType: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case FULL = 'full';
    case PARTIAL = 'partial';
    case TUITION = 'tuition';
    case STIPEND = 'stipend';
    case OTHER = 'other';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FULL => 'primary',
            self::PARTIAL => 'gray',
            self::TUITION => 'warning',
            self::STIPEND => 'danger',
            self::OTHER => 'success',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::FULL => 'Full',
            self::PARTIAL => 'Partial',
            self::TUITION => 'Tuition',
            self::STIPEND => 'Stipend',
            self::OTHER => 'Other',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::FULL => 'heroicon-o-credit-card',
            self::PARTIAL => 'heroicon-o-currency-yen',
            self::TUITION => 'heroicon-o-currency-dollar',
            self::STIPEND => 'heroicon-o-banknotes',
            self::OTHER => 'heroicon-o-gift',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
