@php use Illuminate\Support\Str; use Carbon\Carbon; @endphp
<div class="p-3">
  @if ($flashMessage)
      <div class="alert alert-{{ $flashType }} alert-dismissible fade show" role="alert">
        <span class="alert-text" style="color:white">{{ $flashMessage }}</span><span><a style="color:white" href={{ route('admin.events.show', $flashEventId) }}> Click here to go to details </a> </span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  <div class="row g-2 mb-3">
      <div class="col-md-3">
        <label for="filter-name">Event Name</label>
          <input id="filter-name" type="text" class="form-control" placeholder="Search event name" wire:model.live="searchName">
      </div>
      <div class="col-md-3">
         <label for="filter-start-date">Start Date</label>
         <input id="filter-start-date" type="date" class="form-control" wire:model.lazy="filterStart" placeholder="Start Date">
        </div>
        <div class="col-md-3">
        <label for="filter-start-date">End Date</label>
        <input id="filter-end-date" type="date" class="form-control" wire:model.lazy="filterEnd" placeholder="End Date">
      </div>
      <div class="col-md-3">
        <label for="filter-status">Event Status</label>
          <select id="filter-status" class="form-control" wire:model.lazy="filterStatus">
              <option value="">All Status</option>
              <option value="Online">Online</option>
              <option value="Offline">Offline</option>
          </select>
      </div>
  </div>
  <div class="card-body px-0 pt-0 pb-2">
      <div class="table-responsive p-0">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Event Name</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Event Time</th>
              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              <th class="text-secondary opacity-7"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($events as $event)
            <tr>
              <td>
                <div class="d-flex px-2 py-1">
                  <div class="d-flex flex-column justify-content-center">
                    <h6 class="mb-0 text-sm">{{ Str::limit($event->name, 30) }}</h6>
                  </div>
                </div>
              </td>
              <td>
                <p class="text-xs font-weight-bold mb-0">{{ Str::limit($event->description, 40) }}</p>
              </td>
              <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold">
                  {{ Carbon::parse($event->start_datetime)->translatedFormat('d F Y') }} - <br> {{ Carbon::parse($event->end_datetime)->translatedFormat('d F Y') }}
                </span>
              </td>
              <td class="align-middle text-center text-sm">
                <span class="badge badge-sm bg-gradient-success">Online</span>
              </td>
              <td class="align-middle">
                <a href={{ route('admin.events.show',$event) }} class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Manage event">
                  Manage
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center mt-3">
        {{ $events->links() }}
      </div>
    </div>
</div>