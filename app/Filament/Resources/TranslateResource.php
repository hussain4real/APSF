<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TranslateResource\Pages;
use App\Models\Scholarship;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TranslateResource extends Resource
{
    protected static ?string $model = Scholarship::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('group')
                    ->label('Group')
                    ->default('*')
                    ->required(),
                Forms\Components\TextInput::make('key')
                    ->label('Key')
                    ->required(),
                Forms\Components\Repeater::make('text')
                    ->schema([
                        Forms\Components\TextInput::make('en')
                            ->label('English'),
                        Forms\Components\TextInput::make('ar')
                            ->label('Arabic'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListTranslates::route('/'),
            'create' => Pages\CreateTranslate::route('/create'),
            'view' => Pages\ViewTranslate::route('/{record}'),
            'edit' => Pages\EditTranslate::route('/{record}/edit'),
        ];
    }
}
