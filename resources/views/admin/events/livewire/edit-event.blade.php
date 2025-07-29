<div class="card card-plain">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-info text-gradient">Edit Event</h3>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label>Name Of Event</label>
                    <input type="text" class="form-control" placeholder="Name of Event" wire:model.defer="name">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Location</label>
                    <input type="text" class="form-control" placeholder="Location of Event" wire:model.defer="location">
                    @error('location')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Start Date</label>
                    <input type="date" class="form-control" placeholder="Start Date" wire:model.defer="start_date">
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>End Date</label>
                    <input type="date" class="form-control" placeholder="End Date" wire:model.defer="end_date">
                    @error('end_date')
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
                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Edit</button>
            </div>
        </form>
    </div>
</div>