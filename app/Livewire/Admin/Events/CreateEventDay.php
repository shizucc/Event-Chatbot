<?php
namespace App\Livewire\Admin\Events;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class CreateEventDay extends Component
{
    public $event;
    public $name, $day_date, $open_gate_time, $close_gate_time, $price;

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'day_date' => 'required|date|after_or_equal:' . $this->event->start_date . '|before_or_equal:' . $this->event->end_date,
            'open_gate_time' => 'required|before:close_gate_time',
            'close_gate_time' => 'required|after:open_gate_time',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    public function mount($event)
    {
        $this->event = $event;
    }

    public function resetForm()
    {
        $this->name = null;
        $this->day_date = null;
        $this->open_gate_time = null;
        $this->close_gate_time = null;
        $this->price = null;
    }

        public function save()
    {
        $this->validate($this->rules());
        try {
            $eventDay = \App\Models\EventDay::create([
                'event_id' => $this->event->id,
                'name' => $this->name,
                'day_date' => $this->day_date,
                'open_gate_time' => $this->open_gate_time,
                'close_gate_time' => $this->close_gate_time,
                'price' => $this->price,
            ]);
            $this->resetForm();
            $this->dispatch('eventDayCreated', [
                'success' => true,
                'message' => 'Event Day created successfully!',
                'event_id' => $eventDay->id, 
            ]);
        }catch (\Exception $e) {
            $this->dispatch('eventDayCreated', ['success' => false, 'message' => 'Failed to create event Day: ' . $e->getMessage()]);
        }

    }

    public function render()
    {
        return view('admin.events.livewire.create-event-day');
    }
}