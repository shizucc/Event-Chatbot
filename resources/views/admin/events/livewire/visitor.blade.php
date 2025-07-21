<div>
    <div class="mb-3">
        <label for="eventDaySelect">Pilih Event Day:</label>
        <select id="eventDaySelect" wire:model="eventDayId" class="form-control">
            @foreach($eventDays as $day)
                <option value="{{ $day->id }}">
                    {{ \Carbon\Carbon::parse($day->day_date)->translatedFormat('d F Y') }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
                @forelse($visitors as $visitor)
                    <tr>
                        <td>{{ $visitor->name }}</td>
                        <td>{{ $visitor->email }}</td>
                        <td>{{ $visitor->phone_number }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Tidak ada visitor untuk event day ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
