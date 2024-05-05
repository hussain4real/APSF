<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Models\AboutPage;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;

class AboutPageResource extends Resource
{
    use Translatable;

    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            'index' => Frontends\Resources\AboutPageResource\Pages\ListAboutPages::route('/'),
            'create' => Frontends\Resources\AboutPageResource\Pages\CreateAboutPage::route('/create'),
            'view' => Frontends\Resources\AboutPageResource\Pages\ViewAboutPage::route('/{record}'),
            'edit' => Frontends\Resources\AboutPageResource\Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
