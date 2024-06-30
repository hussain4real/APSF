<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case SUSPENDED = 'suspended';
    case  VERIFIED = 'verified';

    //

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ACTIVE => 'primary',
            self::INACTIVE => 'gray',
            self::PENDING => 'warning',
            self::SUSPENDED => 'danger',
            self::VERIFIED => 'success',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::PENDING => 'Pending',
            self::SUSPENDED => 'Suspended',
            self::VERIFIED => 'Verified',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::ACTIVE => 'heroicon-o-check-circle',
            self::INACTIVE => 'heroicon-o-signal-slash',
            self::PENDING => 'heroicon-o-clock',
            self::SUSPENDED => 'heroicon-o-x-mark',
            self::VERIFIED => 'heroicon-o-check-circle',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
