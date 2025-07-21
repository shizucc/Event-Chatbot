@php use Illuminate\Support\Str; use Carbon\Carbon; @endphp
<div class="p-3">
  <div class="row g-2 mb-3">
      <div class="col-md-3">
          <input type="text" class="form-control" placeholder="Cari Nama Event" wire:model="searchName">
      </div>
      <div>searchName: {{ $searchName }}</div>
      <div class="col-md-3">
          <input type="date" class="form-control" wire:model="filterStart" placeholder="Start Date">
      </div>
      <div class="col-md-3">
          <input type="date" class="form-control" wire:model="filterEnd" placeholder="End Date">
      </div>
      <div class="col-md-3">
          <select class="form-control" wire:model="filterStatus">
              <option value="">Semua Status</option>
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