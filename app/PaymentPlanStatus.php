<?php

namespace App;

use Filament\Support\Colors\Color;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PaymentPlanStatus: string implements HasLabel, HasColor, HasIcon, HasDescription {

    case PENDING = 'pending';
    case PAID = 'paid';
    case FAILED = 'failed';

    public function getLabel(): ?string
    {
        return __($this->value);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => Color::Slate,
            self::PAID => 'info',
            self::FAILED => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PENDING => 'heroicon-o-clock',
            self::PAID => 'heroicon-o-check-circle',
            self::FAILED => 'heroicon-o-x-circle',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::PENDING => 'The payment plan is pending.',
            self::PAID => 'The payment plan has been paid.',
            self::FAILED => 'The payment plan has failed.',
        };
    }
}

