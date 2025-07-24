<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class Flow extends Component
{
    public $event;

    public function render()
    {
        return view('admin.events.livewire.flow');
    }
}
