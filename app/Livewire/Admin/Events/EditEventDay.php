<?php
namespace App\Livewire\Admin\Events;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class EditEventDay extends Component
{
    public $dayId, $name, $day_date, $open_gate_time, $close_gate_time, $price;

    protected $listeners = ['editEventDay' => 'loadEventDay'];

    public function loadEventDay($id)
    {
        $day = \App\Models\EventDay::findOrFail($id);

        $this->dayId = $day->id;
        $this->name = $day->name;
        $this->day_date = $day->day_date;
        $this->open_gate_time = $day->open_gate_time;
        $this->close_gate_time = $day->close_gate_time;
        $this->price = $day->price;

        $this->dispatchBrowserEvent('openEditEventDayModal');
    }

    public function save()
    {
        $this->validate();

        \App\Models\EventDay::findOrFail($this->dayId)->update([
            'name' => $this->name,
            'day_date' => $this->day_date,
            'open_gate_time' => $this->open_gate_time,
            'close_gate_time' => $this->close_gate_time,
            'price' => $this->price,
        ]);

        session()->flash('success', 'Event Day updated!');

        $this->dispatchBrowserEvent('closeEditEventDayModal');

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