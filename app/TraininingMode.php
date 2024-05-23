<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TraininingMode: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';

    case MIXED = 'mixed';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ONLINE => 'primary',
            self::OFFLINE => 'warning',
            self::MIXED => 'success',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::ONLINE => 'Online Training',
            self::OFFLINE => 'Offline Training',
            self::MIXED => 'Both Online and Offline Training',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ONLINE => 'heroicon-o-globe-alt',
            self::OFFLINE => 'heroicon-o-home',
            self::MIXED => 'heroicon-o-arrows-pointing-in',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
