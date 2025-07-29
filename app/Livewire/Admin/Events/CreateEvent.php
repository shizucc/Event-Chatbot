<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class CreateEvent extends Component
{
    public $name;
    public $start_date;
    public $end_date;

    protected $rules = [
        'name' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ];

    public function save()
    {
        $this->validate();

        try {
            $event = Event::create([
                'name' => $this->name,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
            ]);

            // Reset form
            $this->reset(['name', 'start_date', 'end_date']);
            $this->dispatch('eventCreated', [
                'success' => true,
                'message' => 'Event created successfully!',
                'event_id' => $event->id, 
            ]);
        } catch (\Exception $e) {
            $this->dispatch('eventCreated', ['success' => false, 'message' => 'Failed to create event: ' . $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('admin.events.livewire.create-event');
    }
}
