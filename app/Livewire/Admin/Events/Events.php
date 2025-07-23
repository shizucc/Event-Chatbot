<?php

namespace App\Livewire\Admin\Events;

use Livewire\Component;
use App\Models\Event;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    protected string $paginationTheme = 'bootstrap';

    public $searchName = '';
    public $filterStart = '';
    public $filterEnd = '';
    public $filterStatus = '';
    public $flashMessage = null;
    public $flashType = null;
    public $flashEventId = null;

    protected $listeners = ['eventCreated' => 'handleEventCreated'];
    public function handleEventCreated($payload)
    {
        $this->flashMessage = $payload['message'];
        $this->flashType = $payload['success'] ? 'success' : 'danger';
        $this->flashEventId = $payload['event_id'];
    }

    public function updating($property)
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Event::query();

        if ($this->searchName) {
            $query->where('name', 'like', '%' . $this->searchName . '%');
        }
        if ($this->filterStart) {
            $query->where('start_datetime', '>=', $this->filterStart);
        }
        if ($this->filterEnd) {
            $query->where('end_datetime', '<=', $this->filterEnd);
        }
        // Status dummy: event dengan start_datetime di masa depan = Online, selain itu Offline
        if ($this->filterStatus) {
            if ($this->filterStatus === 'Online') {
                $query->where('start_datetime', '>=', now());
            } elseif ($this->filterStatus === 'Offline') {
                $query->where('start_datetime', '<', now());
            }
        }

        $events = $query->orderByDesc('start_datetime')->paginate(10);
        return view('admin.events.livewire.events', compact('events'));
    }
}
