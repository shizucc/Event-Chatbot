<div class="card card-plain">
  <div class="card-header pb-0 text-left">
    <h3 class="font-weight-bolder text-info text-gradient">New Event</h3>
  </div>
  <div class="card-body">
    <form wire:submit.prevent="save">
      <label>Name Of Event</label>
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Name of Event" wire:model.defer="name">
      </div>
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror

      <label>Start Date</label>
      <div class="input-group mb-3">
        <input type="datetime-local" class="form-control" placeholder="Start Date" wire:model.defer="start_datetime">
      </div>
      @error('start_datetime') <span class="text-danger">{{ $message }}</span> @enderror

      <label>End Date</label>
      <div class="input-group mb-3">
        <input type="datetime-local" class="form-control" placeholder="End Date" wire:model.defer="end_datetime">
      </div>
      @error('end_datetime') <span class="text-danger">{{ $message }}</span> @enderror

      <div class="text-center">
        <button type="submit" class="btn btn-round bg-gradient-info btn-lg w-100 mt-4 mb-0">Create</button>
      </div>
    </form>
  </div>

</div>