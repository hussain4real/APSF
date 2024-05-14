<?php

namespace App\Filament\Widgets;

use App\Filament\Clusters\Frontends\Resources\EventResource;
use App\Models\Event;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Model;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    protected static ?int $sort = 3;

    public Model|string|null $model = Event::class;

    //    public function config(): array
    //    {
    //        return [
    //            'firstDay' => 1,
    //            'headerToolbar' => [
    //                'left' => 'dayGridMonth,dayGridWeek,dayGridDay',
    //                'center' => 'title',
    //                'right' => 'prev,next today',
    //            ],
    //        ];
    //    }

    public function getFormSchema(): array
    {
        return
        [
            TextInput::make('event_title.en'),
            Textarea::make('event_description.en'),
            DateTimePicker::make('event_start_date')
                ->format('Y-m-d H:i:s')
                ->native(false)
                ->live(onBlur: true),
            DateTimePicker::make('event_end_date')
                ->format('Y-m-d H:i:s')
                ->native(false)->after('event_start_date'),
            TextInput::make('event_location.en'),
        ];
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {

        // You can use $fetchInfo to filter events by date.
        // This method should return an array of event-like objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#returning-events
        // You can also return an array of EventData objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#the-eventdata-class

        return Event::query()
            ->where('event_start_date', '>=', $fetchInfo['start'])
            ->where('event_end_date', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn (Event $event) => [
                    'id' => $event->id,
                    'title' => $event->getTranslation('event_title', 'en'),
                    'start' => $event->event_start_date,
                    'end' => $event->event_end_date,
                    'location' => $event->event_location,
                    'description' => $event->event_description,
                    //                    'url' => EventResource::getUrl(name: 'view', parameters: ['record' => $event]),
                    //                    'shouldOpenUrlInNewTab' => true,
                ]
            )
            ->all();

    }

    public function eventDidMount(): string
    {
        return <<<'JS'
        function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
            el.setAttribute("x-tooltip", "tooltip");
            el.setAttribute("x-data", "{ tooltip: '"+event.event_title+"' }");
        }
    JS;
    }
}
