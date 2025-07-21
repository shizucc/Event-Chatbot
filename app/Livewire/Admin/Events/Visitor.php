<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use App\Models\EventDay;
use App\Models\Registration;
use App\Models\Visitor as VisitorModel;

class Visitor extends Component
{
    public $event;
    public $eventDayId;
    public $eventDays = [];

    public function mount($event)
    {
        $this->event = $event instanceof Event ? $event : Event::findOrFail($event);
        $this->eventDays = EventDay::where('event_id', $this->event->id)->get();
        $this->eventDayId = $this->eventDays->first()->id ?? null;
    }

    public function render()
    {
        // Ambil visitor berdasarkan event_day yang dipilih
        $visitors = [];
        if ($this->eventDayId) {
            $registrations = Registration::where('event_id', $this->event->id)->pluck('visitor_id');
            $visitors = VisitorModel::whereIn('id', $registrations)->get();
        }
        return view('admin.events.livewire.visitor', [
            'visitors' => $visitors,
            'eventDays' => $this->eventDays,
            'eventDayId' => $this->eventDayId,
        ]);
    }
}
