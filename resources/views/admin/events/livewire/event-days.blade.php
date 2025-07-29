<div>
    @if (session()->has('success'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <span class="alert-text" style="color:white">{{ session('success') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="alert-text" style="color:white">{{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="list-group-item border-0 p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column col-12">
            <div class="d-flex flex-row justify-content-between pb-0">
                <h5>Event Days</h5>
                <div>
                    <button class="btn btn-block btn-default mb-3" data-bs-toggle="modal"
                        data-bs-target="#modalAddEventDays">Add Event Days</button>
                    <div class="modal fade text-start" id="modalAddEventDays" tabindex="-1" role="dialog"
                        aria-labelledby="modalAddEventDays" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    @livewire('admin.events.create-event-day', ['event' => $event])
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
            @foreach ($eventDays as $eventDay)
                <div class="card shadow-sm border-0" style="width: 20rem; min-width: 250px;">
                    <div class="card-body p-4">
                        <h5 class="card-title  fw-bold mb-2">
                            {{ $eventDay->name }}
                        </h5>
                        <p class="mb-1 text-muted">
                            Price : {{ $eventDay->price ? format_rupiah($eventDay->price) : 'Free Entry' }}
                        </p>
                        <p class="mb-1 text-muted">
                            Date :
                            {{ \Carbon\Carbon::parse($eventDay->day_date)->translatedFormat('l, d-m-Y') }}
                        </p>
                        <p class="mb-1">
                            <span class="badge bg-success">Open: {{ $eventDay->open_gate_time }}</span>
                        </p>
                        <p class="mb-3">
                            <span class="badge bg-danger">Close: {{ $eventDay->close_gate_time }}</span>
                        </p>
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex align-items-center">
                                <span class="stat-circle  me-2 text-bold">{{ count($eventDay->registrations) }}</span>
                                <span class="fw-semibold">Registered</span>
                            </div>
                            <hr class="my-0">
                            <div class="d-flex align-items-center">
                                <span class="stat-circle  me-2 text-bold">{{ $eventDay->total_check_in }}</span>
                                <span class="fw-semibold">Check In</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span
                                    class="stat-circle me-2 text-bold">{{ count($eventDay->registrations) - $eventDay->total_check_in }}</span>
                                <span class="fw-semibold">Not Check In</span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>