<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class ShowEvent extends Component
{
    public $event;
    public $name, $location, $start_datetime, $end_datetime, $description;

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->name = $event->name;
        $this->location = $event->location;
        $this->start_datetime = $event->start_datetime;
        $this->end_datetime = $event->end_datetime;
        $this->description = $event->description;
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date',
            'end_datetime' => 'required|date',
            'description' => 'nullable|string',
        ]);

        try {
            $event = Event::findOrFail($this->event->id);
            $event->update([
                'name' => $this->name,
                'location' => $this->location,
                'start_datetime' => $this->start_datetime,
                'end_datetime' => $this->end_datetime,
                'description' => $this->description,
            ]);
            $this->event = $event->fresh(); // refresh data agar tampilan terupdate
            session()->flash('success', 'Event updated successfully!');
            $this->dispatch('eventUpdated');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to update event: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('admin.events.livewire.show-event');
    }
}
