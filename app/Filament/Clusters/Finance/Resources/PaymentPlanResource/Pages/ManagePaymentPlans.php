<?php

namespace App\Filament\Clusters\Finance\Resources\PaymentPlanResource\Pages;

use App\Filament\Clusters\Finance\Resources\PaymentPlanResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePaymentPlans extends ManageRecords
{
    protected static string $resource = PaymentPlanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
