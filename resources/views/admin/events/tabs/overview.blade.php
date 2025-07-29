<div>
    @livewire('admin.events.show-event', ['event' => $event])
    @livewire('admin.events.event-days', ['event' => $event])


    <script>
        window.addEventListener('eventUpdated', () => {
            $('#modal-edit-form').modal('hide');
        });
        window.addEventListener('eventDayCreated', () => {
            $('#modalAddEventDays').modal('hide');
        });

        window.addEventListener('openEditEventDayModal', () => {
            $('#modal-edit-event-day').modal('show');
        });

        window.addEventListener('closeEditEventDayModal', () => {
            $('#modal-edit-event-day').modal('hide');
        });

    </script>
</div>