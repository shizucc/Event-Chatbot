@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="d-flex flex-row justify-content-between card-header pb-0">
                            <h6>All Events</h6>
                            <div>
                                <button type="button" class="btn btn-block btn-default mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modal-form">Add New Event</button>
                                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-form" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body p-0">
                                                <livewire:admin.events.create-event />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <livewire:admin.events.events />

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        window.addEventListener('eventCreated', () => {
            $('#modal-form').modal('hide');
        });
    </script>
@endsection
