<?php

namespace App;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TrainingEnrollmentStatus: string implements HasColor, HasDescription, HasIcon, HasLabel
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::PENDING => 'warning',
            self::PAID => 'primary',
            self::APPROVED => 'success',
            self::REJECTED => 'danger',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::PENDING => 'Pending Enrollment',
            self::PAID => 'Paid Enrollment',
            self::APPROVED => 'Approved Enrollment',
            self::REJECTED => 'Rejected Enrollment',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::PENDING => 'heroicon-o-clock',
            self::PAID => 'heroicon-o-banknotes',
            self::APPROVED => 'heroicon-o-check-circle',
            self::REJECTED => 'heroicon-o-x-circle',
        };
    }

    public function getLabel(): ?string
    {
        return __($this->value);
    }
}
