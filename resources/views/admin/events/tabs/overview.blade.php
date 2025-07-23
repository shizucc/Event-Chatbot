<div>
    @livewire('admin.events.show-event', ['event' => $event])


    <script>
        window.addEventListener('eventUpdated', () => {
            $('#modal-edit-form').modal('hide');
        });
    </script>
</div>