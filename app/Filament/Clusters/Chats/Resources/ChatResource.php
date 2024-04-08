<?php

//
//namespace App\Filament\Clusters\Chats\Resources;
//
//use App\Filament\Clusters\Chats;
//use App\Filament\Clusters\Chats\Resources\ChatResource\Pages;
//use App\Models\Chat;
//use Filament\Forms;
//use Filament\Forms\Form;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Actions\Action;
//use Filament\Tables\Table;
//
//class ChatResource extends Resource
//{
//    protected static ?string $model = Chat::class;
//
//    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
//
//    protected static ?string $cluster = Chats::class;
//
//    public static function form(Form $form): Form
//    {
//        return $form
//            ->schema([
//                Forms\Components\TextInput::make('user_id')
//                    ->required()
//                    ->numeric(),
//                Forms\Components\TextInput::make('group_name')
//                    ->maxLength(255),
//            ]);
//    }
//
//    public static function table(Table $table): Table
//    {
//        return $table
//            ->columns([
//                Tables\Columns\TextColumn::make('user_id')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('group_name')
//                    ->searchable(),
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
//                //
//            ])
////            ->headerActions([
////                Action::make('chat')
////                    ->modalContent(view('vendor.Chatify.pages.app')),
////            ])
//            ->actions([
//                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
//            ])
//            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
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
//            'index' => Pages\ListChats::route('/'),
//            'create' => Pages\CreateChat::route('/create'),
//            'view' => Pages\ViewChat::route('/{record}'),
//            'edit' => Pages\EditChat::route('/{record}/edit'),
//        ];
//    }
//}
