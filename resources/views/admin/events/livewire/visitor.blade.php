<div>
    <div class="mb-3">
        <label for="eventDaySelect">Pilih Event Day:</label>
        <select id="eventDaySelect" wire:model.lazy="eventDayId" class="form-control">
            @foreach($eventDays as $day)
                <option value="{{ $day->id }}">
                    {{ \Carbon\Carbon::parse($day->day_date)->translatedFormat('d F Y H:i') }}
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
                    <th>Status Registrasi</th>
                    <th>Status Pembayaran</th>
                    <th>QR Ticket</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $registration)
                    <tr>
                        <td>{{ $registration->visitor->name ?? '-' }}</td>
                        <td>{{ $registration->visitor->email ?? '-' }}</td>
                        <td>{{ $registration->visitor->phone_number ?? '-' }}</td>
                        <td>{{ $registration->status }}</td>
                        <td>{{ $registration->payment?->status ?? '-' }}</td>
                        <td>
                            @if($registration->ticket)
                                <a href="{{ asset($registration->ticket->qr_code_path) }}" target="_blank">Lihat QR</a>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada visitor untuk event day ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if (count($registrations) > 0)
    <div class="mt-3">
        {{ $registrations->links() }}
    </div>
    @endif
</div>
