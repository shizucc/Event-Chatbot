<div>
<div class="nav-wrapper position-relative end-0 my-3">
    <ul class="nav nav-pills nav-fill p-1" role="tablist">
        <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1 @if($activeTab === 'overview') active @endif"
               wire:click.prevent="setTab('overview')" href="#">
                <i class="ni ni-badge text-sm me-2"></i> Overview
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1"
               href="{{ route('admin.events.registration-flow', $event) }}">
                <i class="ni ni-laptop text-sm me-2"></i> Registration Flow
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1 @if($activeTab === 'visitor') active @endif"
               wire:click.prevent="setTab('visitor')" href="#">
                <i class="ni ni-laptop text-sm me-2"></i> Visitor
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link mb-0 px-0 py-1"
               href="{{ route('admin.events.scanner', $event) }}">
                <i class="ni ni-laptop text-sm me-2"></i> Scanner
            </a>
        </li>
    </ul>
</div>
<div class="card-body px-0 pt-0 pb-2">
    <div class="tab-content mt-3">
        @if($activeTab === 'overview')
            @include('admin.events.tabs.overview', ['event' => $event])
        @elseif($activeTab === 'visitor')
            @livewire('admin.events.visitor', ['event' => $event])
        @endif
    </div>          
</div>
</div>