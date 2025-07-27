<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class Flow extends Component
{
    public $event;
    public $nodes;

    protected $listeners = ['saveFlow'];

    public function mount($eventId)
    {
        $event = Event::findOrFail($eventId);
        $this->event = $event;
        $nodes = \App\Models\FlowNode::all();
        $this->nodes = $nodes;
    }

    public function saveFlow($flowJson)
    {
        try {
            $event = Event::findOrFail($this->event->id);
            $event->update(
                [
                    'form_flow' => $flowJson
                ]
                );
            session()->flash('success', 'Event Flow saved successfully!');
            $this->dispatch('flow-saved');
        }catch (Exception $e) {
            session()->flash('error', 'Failed to update Event Flow: ' . $e->getMessage());
        }

    }

    public function render()
    {
        return view('admin.events.livewire.flow', [
            'event' => $this->event,
            'nodes' => $this->nodes,
        ]);
    }
}
