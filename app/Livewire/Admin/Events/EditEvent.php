<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class EditEvent extends Component
{

    public function render()
    {
        return view('admin.events.livewire.edit-event');
    }
}
