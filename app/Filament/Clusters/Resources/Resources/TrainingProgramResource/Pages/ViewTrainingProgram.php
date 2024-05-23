<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use Filament\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainingProgram extends ViewRecord
{
    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('title')
                    ->label(__('Title')),
                TextEntry::make('description')
                    ->label(__('Description')),
                TextEntry::make('duration')
                    ->label(__('Duration')),
                TextEntry::make('cost')
                    ->label(__('Cost')),
                TextEntry::make('instructor_name')
                    ->label(__('Instructor Name')),
                TextEntry::make('type')
                    ->label(__('Type')),
                TextEntry::make('mode_of_delivery')
                    ->label(__('Mode of Delivery')),
                TextEntry::make('status')
                    ->label(__('Status')),
                TextEntry::make('start_date')
                    ->label(__('Start Date')),
                TextEntry::make('end_date')
                    ->label(__('End Date')),
            ]);
    }
}
