<div>
    @livewire('admin.events.show-event', ['event' => $event])
    @livewire('admin.events.event-days', ['event' => $event])


    <script>
        window.addEventListener('eventUpdated', () => {
            $('#modal-edit-form').modal('hide');
        });
    </script>
</div>