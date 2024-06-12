<?php

namespace App\Filament\Clusters\Finance\Resources;

use App\Filament\Clusters\Finance;
use App\Filament\Clusters\Finance\Resources\PaymentPlanResource\Pages;
use App\Filament\Clusters\Finance\Resources\PaymentPlanResource\RelationManagers;
use App\Models\PaymentPlan;
use App\PaymentPlanStatus;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class PaymentPlanResource extends Resource
{
    protected static ?string $model = PaymentPlan::class;

    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $cluster = Finance::class;
    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('user_id')
                    ->relationship(
                        name: 'user',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn (Builder $query) => $query->whereHas('trainingProvider')
                            ->orWhereHas('educationalConsultant')
                            ->orWhereHas('contractor')
                    ),

                    ToggleButtons::make('status')
                    ->label(__('Status'))
                    ->options(PaymentPlanStatus::class)
                    ->inline()
                    ->default(PaymentPlanStatus::PENDING),

                ToggleButtons::make('first_currency')
                    ->label(__('First Currency'))
                    ->options([
                        'USD' => 'USD',
                        'QAR' => 'QAR',
                    ])
                    ->default('USD')
                    ->disabled()
                    ->dehydrated()
                    ->inline(),

                TextInput::make('first_currency_amount')
                    ->prefixIcon('heroicon-o-currency-dollar')
                    ->prefixIconColor('primary')
                    ->afterStateUpdated(function (Set $set, Get $get, $state) {
                     $firstCurrencyAmount = $get('first_currency_amount');   
                    
                        // dd($firstCurrencyAmount);
                       $amount= static::convertCurrency($firstCurrencyAmount, 'USD', 'QAR');
                       //convert amount to int
                       $amount = (int)$amount;
                       $set('second_currency_amount', $amount);
                    // $analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
                    // dd($analyticsData);

                    })
                    ->live(onBlur:true),

                ToggleButtons::make('second_currency')
                    ->label(__('Second Currency'))
                    ->options([
                        'USD' => 'USD',
                        'QAR' => 'QAR',
                    ])
                    ->default('QAR')
                    ->disabled()
                    ->dehydrated()
                    ->inline(),

                TextInput::make('second_currency_amount')
                    ->prefix('QAR')
                    ->prefixIconColor('primary'),

                   
            ])
            ->columns(2);
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
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function convertCurrency($amount, $from, $to)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/$from";
        $response = json_decode(file_get_contents($url));
        $rate = $response->rates->$to;
        return $amount * $rate;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePaymentPlans::route('/'),
        ];
    }
}
