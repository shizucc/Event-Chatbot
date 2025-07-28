<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class EventDays extends Component
{
    public $event;
    public $eventDays = [];


    public function mount($event)
    {
        $this->event = $event;

        $eventDays = \App\Models\EventDay::with(['registrations.ticket'])->where('event_id', $this->event->id)
            ->orderBy('day_date', 'asc')
            ->get();

        // Tambahkan kolom semu total_check_in
        foreach ($eventDays as $eventDay) {
            $eventDay->total_check_in = $eventDay->registrations->filter(function ($reg) {
                return $reg->ticket && $reg->ticket->scanned_at !== null;
            })->count();
        }

        $this->eventDays = $eventDays;
    }
    public function render()
    {
        return view('admin.events.livewire.event-days');
    }
}
