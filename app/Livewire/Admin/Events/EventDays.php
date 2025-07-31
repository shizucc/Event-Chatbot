<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class EventDays extends Component
{
    public $event;
    public $eventDays = [];

    public function mount($event)
    {
        $this->event = $event;
        $this->loadEventDays();
    }
    protected $listeners = [
        'eventDayCreated' => 'handleEventDaysCreated',
        'eventDayUpdated' => 'handleEventDaysUpdated',
    ];
    public function handleEventDaysCreated($payload)
    {
        if ($payload['success']) {
            $this->loadEventDays();
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }
    public function handleEventDaysUpdated($payload)
    {
        if ($payload['success']) {
            $this->loadEventDays();
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }

    public function loadEventDays()
    {
        $eventDays = \App\Models\EventDay::with(['registrations.ticket'])
            ->where('event_id', $this->event->id)
            ->orderBy('day_date', 'asc')
            ->get();

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
