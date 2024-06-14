<?php

namespace App\Filament\Clusters\Finance\Resources\TransactionResource\Pages;

use App\Filament\Clusters\Finance\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTransaction extends CreateRecord
{
    protected static string $resource = TransactionResource::class;
}
