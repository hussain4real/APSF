<?php

namespace App\Livewire\TrainingPrograms;

use App\Models\TrainingProgram;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Livewire\Component;

class ViewTrainingProgram extends Component implements HasInfolists, HasForms
{
    use InteractsWithForms, InteractsWithInfolists;
    public ?TrainingProgram $trainingProgram = null;
    public $record;



    public function mount(): void
    {
        $this->getTrainingProgram();
    }

    public function getTrainingProgram(): void
    {
        $requestParam = request()->route()->parameters();
        // dd($requestParam);
        $recordId = $requestParam['record'] ?? null;
        // dd($recordId);
        //get the record from session
        // $record = session()->get('record');
        
        $trainingProgram = TrainingProgram::find($recordId) ?? TrainingProgram::first();
        // $trainingProgram = TrainingProgram::find($this->record) ?? TrainingProgram::first();
        $this->trainingProgram = $trainingProgram;
    }
    public function trainingProgramInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->trainingProgram ?? new TrainingProgram())
            ->schema([
                Split::make([
                    Section::make([
                        Group::make([
                            SpatieMediaLibraryImageEntry::make('attachement')
                                ->label(__('Profile Photo'))
                                ->hiddenLabel()
                                ->collection('banner')
                                ->defaultImageUrl('https://images.unsplash.com/photo-1505455184862-554165e5f6ba?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
                                // ->defaultImageUrl(fn ($record) => $record->profile_photo_url)
                                ->height(400)
                                ->width(600)
                                ->alignment(Alignment::Center)
                                ->extraImgAttributes([
                                    'class' => 'rounded-lg shadow-md object-cover object-center',
                                    'alt' => 'Profile Photo',
                                    'loading' => 'lazy',
                                ])
                                ->columnSpan(2),
                            Group::make([
                                TextEntry::make('title')
                                    ->label(__('Title'))
                                    ->icon('heroicon-o-identification')
                                    ->iconColor('primary'),

                                TextEntry::make('instructor_name')
                                    ->label(__('Instructor'))
                                    ->icon('heroicon-o-user-circle')
                                    ->iconColor('primary'),
                                TextEntry::make('duration')
                                    ->label(__('Duration'))
                                    ->icon('heroicon-o-clock')
                                    ->iconColor('primary'),
                                TextEntry::make('regular_price')
                                    ->label(__('Regular Price'))
                                    ->icon('heroicon-o-currency-dollar')
                                    ->iconColor('primary'),
                                TextEntry::make('member_price')
                                    ->label(__('Member Price'))
                                    ->icon('heroicon-o-currency-dollar')
                                    ->iconColor('primary'),
                            ]),
                        ])
                            ->columns(3),

                        Group::make([

                            TextEntry::make('description')
                                ->label(__('Description'))
                                ->columnSpanFull()
                                ->iconColor('primary'),

                        ])
                            ->columns(2),
                    ]),
                    Group::make([
                        Section::make([
                            TextEntry::make('status')
                                ->label(__('Status'))
                                ->badge(),
                            TextEntry::make('type')
                                ->label(__('Training Type'))
                                ->badge(),
                            TextEntry::make('mode_of_delivery')
                                ->label(__('Mode of Delivery'))
                                ->badge(),
                            TextEntry::make('start_date')
                                ->label(__('Start Date'))
                                ->date(format: 'M d, Y')
                                // ->since()
                                ->color(Color::Sky)
                                ->icon('heroicon-o-calendar')
                                ->iconColor('primary'),
                            TextEntry::make('end_date')
                                ->label(__('End Date'))
                                ->date(format: 'M d, Y')
                                // ->since()
                                ->color(Color::Sky)
                                ->icon('heroicon-o-calendar')
                                ->iconColor('primary'),
                        ]),
                    ])
                        ->grow(false),
                ])
                    ->from('md')
                    ->columnSpanFull(),
            ]);
    }

    public function render()
    {
        return view('livewire.training-programs.view-training-program');
    }
}
