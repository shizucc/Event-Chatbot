<?php
namespace App\Livewire\Admin\Events;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class EditEventDay extends Component
{
    public $day;
    public $dayId, $name, $day_date, $open_gate_time, $close_gate_time, $price;

    protected $listeners = ['editEventDay' => 'loadEventDay'];

    public function loadEventDay($dayId)
    {
        $day = \App\Models\EventDay::with('event')->findOrFail($dayId);
        $this->day = $day;
        $this->dayId = $day->id;
        $this->name = $day->name;
        $this->day_date = $day->day_date;
        $this->open_gate_time = $day->open_gate_time;
        $this->close_gate_time = $day->close_gate_time;
        $this->price = $day->price;
        // Reset validation errors
        $this->resetValidation();
        $this->dispatch('openEditEventDayModal');
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:50',
            'day_date' => 'required|date|after_or_equal:' . $this->day->event->start_date . '|before_or_equal:' . $this->day->event->end_date,
            'open_gate_time' => 'required|before:close_gate_time',
            'close_gate_time' => 'required|after:open_gate_time',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    public function save()
    {
        $this->validate($this->rules());

        \App\Models\EventDay::findOrFail($this->dayId)->update([
            'name' => $this->name,
            'day_date' => $this->day_date,
            'open_gate_time' => $this->open_gate_time,
            'close_gate_time' => $this->close_gate_time,
            'price' => $this->price,
        ]);

        $this->dispatch('closeEditEventDayModal');

        // Optional: notify parent list to refresh
        $this->dispatch('eventDayUpdated', [
            'success' => true,
            'message' => 'Event day updated!'
        ]);
    }

    public function render()
    {
        return view('admin.events.livewire.edit-event-day');
    }
}