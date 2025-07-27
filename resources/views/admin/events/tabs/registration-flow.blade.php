@extends('layouts.user_type.auth')

@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.events.show', $event) }}" class="btn btn-secondary mb-3">&larr; Back to Event</a>
    <div class="card">
        <div class="card-body">
            @livewire('admin.events.flow', ['eventId' => $event->id])
        </div>
    </div>
</div>
@endsection