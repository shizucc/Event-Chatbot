<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class EditEvent extends Component
{
    public $event;
    public $name, $location, $start_date, $end_date, $description;



    public function mount(Event $event)
    {
        $this->event = $event;
        $this->name = $event->name;
        $this->location = $event->location;
        $this->start_date = $event->start_date;
        $this->end_date = $event->end_date;
        $this->description = $event->description;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string',
        ]);

        try {
            $this->event->update([
                'name' => $this->name,
                'location' => $this->location,
                'start_date' => $this->start_date,
                'end_date' => $this->end_date,
                'description' => $this->description,
            ]);
            $this->dispatch('eventUpdated', [
                'success' => true,
                'message' => 'Event updated successfully!',
                'event_id' => $this->event->id,
            ]);
        } catch (\Exception $e) {
            $this->dispatch('eventUpdated', ['success' => false, 'message' => 'Failed to create event: ' . $e->getMessage()]);
        }
    }

    public function render()
    {
        return view('admin.events.livewire.edit-event');
    }
}