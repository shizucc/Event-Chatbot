@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Event Details</h5>
                        </div>
                    </div>
                @livewire('admin.events.event-tab', ['event' => $event])
                </div>
            </div>
        </div>
    </div>
@endsection
