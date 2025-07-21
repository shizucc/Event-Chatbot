<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;

class EventTab extends Component
{
    public $event;
    public $activeTab = 'overview';

    protected $queryString = [
        'activeTab' => ['as' => 'tab', 'except' => 'overview'],
    ];

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('admin.events.livewire.event-tab');
    }
}
