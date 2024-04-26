<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\ServiceResource\Pages;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceResource extends Resource
{
    use Translatable;

    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('service_side_title')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('service_description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('service_one')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_tag_two')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_tag_three')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_tag_four')
                    ->maxLength(255),
                Forms\Components\TextInput::make('service_tag_five')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_side_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_one')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_tag_two')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_tag_three')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_tag_four')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_tag_five')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
