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
                    class="text-dark ms-sm-2 font-weight-bold">{{ \Carbon\Carbon::parse($event->start_datetime)->translatedFormat('d F Y H:i') }}</span></span>
            <span class="text-xs">End Date: <span
                    class="text-dark ms-sm-2 font-weight-bold">{{ \Carbon\Carbon::parse($event->end_datetime)->translatedFormat('d F Y H:i') }}</span></span>

        </div>
        <div class="ms-auto text-end">
            <button class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal" data-bs-target="#modal-edit-form"><i
                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</button>
            <div class="modal fade text-start" id="modal-edit-form" tabindex="-1" role="dialog"
                aria-labelledby="modal-edit-form" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h3 class="font-weight-bolder text-info text-gradient">Edit Event</h3>
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="save">
                                        <div class="row">
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>Name Of Event</label>
                                                <input type="text" class="form-control" placeholder="Name of Event"
                                                    wire:model.defer="name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>Location</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Location of Event" wire:model.defer="location">
                                                @error('location')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>Start Date</label>
                                                <input type="datetime-local" class="form-control"
                                                    placeholder="Start Date" wire:model.defer="start_datetime">
                                                @error('start_datetime')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 col-md-6 mb-3">
                                                <label>End Date</label>
                                                <input type="datetime-local" class="form-control" placeholder="End Date"
                                                    wire:model.defer="end_datetime">
                                                @error('end_datetime')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label>Description</label>
                                                <textarea class="form-control" wire:model.defer="description" rows="3"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit"
                                                class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                    class="far fa-trash-alt me-2"></i>Delete</a>
        </div>
    </div>

</div>
