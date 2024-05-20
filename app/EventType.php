<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum EventType: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case CONFERENCE = 'conference';
    case MEETING = 'meeting';
    case SEMINAR = 'seminar';
    case WORKSHOP = 'workshop';
    case NEWS = 'news';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::CONFERENCE => 'primary',
            self::MEETING => 'gray',
            self::SEMINAR => 'warning',
            self::WORKSHOP => 'danger',
            self::NEWS => 'success',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::CONFERENCE => 'Conference',
            self::MEETING => 'Meeting',
            self::SEMINAR => 'Seminar',
            self::WORKSHOP => 'Workshop',
            self::NEWS => 'News',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::CONFERENCE => 'heroicon-o-calendar',
            self::MEETING => 'heroicon-o-users',
            self::SEMINAR => 'heroicon-o-clipboard-check',
            self::WORKSHOP => 'heroicon-o-cog',
            self::NEWS => 'heroicon-o-newspaper',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
