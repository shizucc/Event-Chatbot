<div class="card card-plain">
    <div class="card-header pb-0 text-left">
        <h3 class="font-weight-bolder text-info text-gradient">Edit Event Day</h3>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-12 col-md-6 mb-3">
                    <label>Name Of Event Day</label>
                    <input type="text" class="form-control" placeholder="Name of Event" wire:model.defer="name">
                    @error('name') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Day Date</label>
                    <input type="date" class="form-control" wire:model.defer="day_date">
                    @error('day_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Open Gate Time</label>
                    <input type="time" class="form-control" wire:model.defer="open_gate_time">
                    @error('open_gate_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Close Gate Time</label>
                    <input type="time" class="form-control" wire:model.defer="close_gate_time">
                    @error('close_gate_time') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Price</label>
                    <input type="number" class="form-control" wire:model.defer="price">
                    @error('price') <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Tambah</button>
            </div>
        </form>
    </div>
</div>