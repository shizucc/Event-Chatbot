<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class CreateEvent extends Component
{
    public $name;
    public $start_datetime;
    public $end_datetime;

    protected $rules = [
        'name' => 'required|string|max:255',
        'start_datetime' => 'required|date',
        'end_datetime' => 'required|date|after_or_equal:start_datetime',
    ];

    public function save()
    {
        $this->validate();

        Event::create([
            'name' => $this->name,
            'start_datetime' => $this->start_datetime,
            'end_datetime' => $this->end_datetime,
        ]);

        // Reset form
        $this->reset(['name', 'start_datetime', 'end_datetime']);
        // Emit event jika ingin trigger refresh tabel atau tutup modal
        $this->dispatch('eventCreated');
    }

    public function render()
    {
        return view('admin.events.livewire.create-event');
    }
}
