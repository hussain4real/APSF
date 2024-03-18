<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum Status: string implements HasColor,HasDescription,HasIcon, HasLabel
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
    case SUSPENDED = 'suspended';
    //
    /**
     * @return string|array|null
     */
    public function getColor(): string|array|null
    {
       return match($this){
           self::ACTIVE => 'primary',
           self::INACTIVE => 'gray',
           self::PENDING => 'warning',
           self::SUSPENDED => 'danger',
       };
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return match($this){
            self::ACTIVE => 'Active',
            self::INACTIVE => 'Inactive',
            self::PENDING => 'Pending',
            self::SUSPENDED => 'Suspended',
        };
    }

    /**
     * @return string|null
     */
    public function getIcon(): ?string
    {
        return match($this){
            self::ACTIVE => 'heroicon-check-circle',
            self::INACTIVE => 'heroicon-x-circle',
            self::PENDING => 'heroicon-clock',
            self::SUSPENDED => 'heroicon-pause-circle',
        };
    }

    /**
     * @return string|null
     */
    public function getLabel(): ?string
    {
        return $this->value;
    }
}
