<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventDay;
use App\Models\Registration;
use App\Models\Visitor as VisitorModel;
use Livewire\WithPagination;

class Visitor extends Component
{
    use WithPagination;
    protected string $paginationTheme = 'bootstrap';

    public $event;
    public $eventDayId = 47;
    public $eventDays = [];


    public function mount($event)
    {
        $this->event = $event instanceof Event ? $event : Event::findOrFail($event);
        $this->eventDays = EventDay::where('event_id', $this->event->id)->get();
        $this->eventDayId = $this->eventDays->first()?->id ?? null;
    }

    public function updatedEventDayId($value)
    {
        $this->eventDayId = intval($value);
    }

    public function render()
    {
        $registrations = collect();
        if ($this->eventDayId) {
            $registrations = Registration::with(['visitor', 'payment', 'ticket'])
                ->where('event_day_id', $this->eventDayId)
                ->paginate(2);
        }
        return view('admin.events.livewire.visitor', [
            'registrations' => $registrations,
            'eventDays' => $this->eventDays,
            'eventDayId' => $this->eventDayId,
        ]);
    }
}

