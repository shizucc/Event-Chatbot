<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class ShowEvent extends Component
{
    public $event;

    protected $listeners = ['eventUpdated' => 'handleEventUpdated'];

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function handleEventUpdated($payload)
    {
        if ($payload['success']) {
            $this->event = Event::find($payload['event_id']);
            session()->flash('success', $payload['message']);
        } else {
            session()->flash('error', $payload['message']);
        }
    }

    public function render()
    {
        return view('admin.events.livewire.show-event');
    }
}
