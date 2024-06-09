<?php

namespace App\Filament\Widgets;

use App\EventType;
use App\Filament\Clusters\Frontends\Resources\EventResource;
use App\Models\Event;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    protected static ?int $sort = 3;

    public Model|string|null $model = Event::class;

    public function config(): array
    {
        return [
            // 'firstDay' => 1,
            // 'headerToolbar' => [
            //     'left' => 'dayGridMonth,dayGridWeek,dayGridDay',
            //     'center' => 'title',
            //     'right' => 'prev,next today',
            // ],
        ];
    }

    public function getFormSchema(): array
    {
        return
            [
                TextInput::make('event_title'),
                Textarea::make('event_description'),
                DateTimePicker::make('event_start_date')
                    ->format('Y-m-d H:i:s')
                    ->native(false)
                    ->live(onBlur: true),
                DateTimePicker::make('event_end_date')
                    ->format('Y-m-d H:i:s')
                    ->native(false)->after('event_start_date'),
                TextInput::make('event_location'),
                Select::make('type')
                    ->options(EventType::class),
            ];
    }

    protected function modalActions(): array
    {
        return [
            CreateAction::make()
                ->disabled(true),
            EditAction::make()
                ->mountUsing(
                    function (Event $record, Form $form, array $arguments) {
                        dd($record, $form, $arguments);
                        $form->fill([
                            'name' => $record?->event_title,
                            'starts_at' => $arguments['event']['start'] ?? $record?->event_start_date,
                            'ends_at' => $arguments['event']['end'] ?? $record?->event_end_date,
                        ]);
                    }
                ),
            DeleteAction::make(),
        ];
    }

    /**
     * FullCalendar will call this function whenever it needs new events data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {

        // You can use $fetchInfo to filter events by date.
        // This method should return an array of events-like objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#returning-events
        // You can also return an array of EventData objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#the-eventdata-class

        return Event::query()
            ->where('event_start_date', '>=', $fetchInfo['start'])
            ->where('event_end_date', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Event $event) => EventData::make()
                    ->id($event->id)
                    ->title($event->event_title)
                    ->start($event->event_start_date)
                    ->end($event->event_end_date)
                    ->url(
                        url: EventResource::getUrl(name: 'view', parameters: ['record' => $event]),
                        shouldOpenUrlInNewTab: true
                    )
            )
            ->toArray();
    }

    // public function eventDidMount(): string
    // {
    //     return <<<'JS'
    //     function({ events, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
    //         el.setAttribute("x-tooltip", "tooltip");
    //         el.setAttribute("x-data", "{ tooltip: '"+events.id+"' }");
    //     }
    // JS;
    // }
}
