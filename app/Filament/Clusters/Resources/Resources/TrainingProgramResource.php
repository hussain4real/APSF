<?php

//
//namespace App\Filament\Clusters\Resources\Resources;
//
//use App\Filament\Clusters\Resources;
//use App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;
//use App\Models\TrainingProgram;
//use Filament\Pages\SubNavigationPosition;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;
//
//class TrainingProgramResource extends Resource
//{
//    protected static ?string $model = TrainingProgram::class;
//
//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//
//    protected static ?string $cluster = Resources::class;
//
//    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
//
//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                Tables\Columns\TextColumn::make('trainingProvider.id')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('title')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('duration')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('cost')
//                    ->money()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('instructor_name')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('mode_of_delivery')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('type')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('status')
//                    ->searchable(),
//                Tables\Columns\TextColumn::make('start_date')
//                    ->dateTime()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('end_date')
//                    ->dateTime()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('deleted_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime()
//                    ->sortable()
//                    ->toggleable(isToggledHiddenByDefault: true),
//            ])
//            ->filters([
//                Tables\Filters\TrashedFilter::make(),
//            ])
//            ->actions([
//                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                    Tables\Actions\ForceDeleteBulkAction::make(),
//                    Tables\Actions\RestoreBulkAction::make(),
//                ]),
//            ]);
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => Pages\ListTrainingPrograms::route('/'),
//            'create' => Pages\CreateTrainingProgram::route('/create'),
//            'view' => Pages\ViewTrainingProgram::route('/{record}'),
//            'edit' => Pages\EditTrainingProgram::route('/{record}/edit'),
//        ];
//    }
//
//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()
//            ->withoutGlobalScopes([
//                SoftDeletingScope::class,
//            ]);
//    }
//}
