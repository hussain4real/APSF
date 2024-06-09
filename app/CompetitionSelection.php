<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum CompetitionSelection: string implements HasLabel, HasColor, HasDescription, HasIcon
{
    case FIRST = 'first';
    case SECOND = 'second';
    case THIRD = 'third';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::FIRST => 'primary',
            self::SECOND => 'gray',
            self::THIRD => 'warning',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::FIRST => 'First Place',
            self::SECOND => 'Second Place',
            self::THIRD => 'Third Place',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::FIRST => 'heroicon-o-award',
            self::SECOND => 'heroicon-o-award',
            self::THIRD => 'heroicon-o-award',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
