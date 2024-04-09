<?php

//
//namespace App\Filament\Clusters\Chats\Resources;
//
//use App\Filament\Clusters\Chats;
//use App\Filament\Clusters\Chats\Resources\MessageResource\Pages;
//use App\Models\Message;
//use Filament\Forms;
//use Filament\Forms\Form;
//use Filament\Resources\Resource;
//use Filament\Tables;
//use Filament\Tables\Table;
//
//class MessageResource extends Resource
//{
//    protected static ?string $model = Message::class;
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
//                    ->default(auth()->id())
//                    ->numeric(),
//                Forms\Components\Select::make('chat_id')
//                    ->relationship('chat', 'id')
//                    ->required(),
//                Forms\Components\Textarea::make('body')
//                    ->columnSpanFull(),
//                Forms\Components\DateTimePicker::make('last_read'),
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
//                Tables\Columns\TextColumn::make('chat.id')
//                    ->numeric()
//                    ->sortable(),
//                Tables\Columns\TextColumn::make('last_read')
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
//                //
//            ])
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
//            'index' => Pages\ListMessages::route('/'),
//            'create' => Pages\CreateMessage::route('/create'),
//            'view' => Pages\ViewMessage::route('/{record}'),
//            'edit' => Pages\EditMessage::route('/{record}/edit'),
//        ];
//    }
//}
