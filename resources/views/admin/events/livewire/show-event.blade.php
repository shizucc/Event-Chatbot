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
    <div class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
        <div class="d-flex flex-column">
            <h5 class="mb-3">{{ $event->name }}</h5>
            <span class="mb-2 text-xs">Event Location : <span
                    class="text-dark font-weight-bold ms-sm-2">{{ $event->location }}</span></span>
            <span class="mb-2 text-xs">Event Description : <span
                    class="text-dark ms-sm-2 font-weight-bold">{{ $event->description }}</span></span>
            <span class="text-xs">Start Date: <span
                    class="text-dark ms-sm-2 font-weight-bold">{{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y') }}</span></span>
            <span class="text-xs">End Date: <span
                    class="text-dark ms-sm-2 font-weight-bold">{{ \Carbon\Carbon::parse($event->end_date)->translatedFormat('d F Y ') }}</span></span>

        </div>
        <div class="ms-auto text-end">
            <button class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modal-edit-form"><i
                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</button>
            <div class="modal fade text-start" id="modal-edit-form" tabindex="-1" role="dialog"
                aria-labelledby="modal-edit-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <livewire:admin.events.edit-event :event="$event" />
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                    class="far fa-trash-alt me-2"></i>Delete</a>
        </div>
    </div>

</div>
