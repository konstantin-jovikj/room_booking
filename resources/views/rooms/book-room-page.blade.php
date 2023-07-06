<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="min-height: calc(100vh - 65px);">
        <x-side-nav></x-side-nav>
        {{-- <x-book-room :room="$room :bookedRanges="$bookedRanges" /> --}}

        <div class="min-w-screen flex items-center p-5 lg:p-10 relative w-full">

            <div class="p-8 bg-white w-full shadow-lg rounded-lg min-w-[380px] max-w-[420px]">
                <h2 class="text-center text-lg font-bold text-red-800 uppercase">Book the room</h2>

                <form class=" mx-auto p-2 mt-2 rounded border-2" action="{{ route('store.room.booking', $room->id) }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    @if (session()->has('message'))
                        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="check_in">Check-in Date:</label>
                        <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                            @foreach ($bookedRanges as $range)
                                                    @if (date('Y-m-d') >= $range['check_in'] && date('Y-m-d') <= $range['check_out'])
                                                        disabled
                                                    @endif @endforeach>
                        @error('check_in')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="check_out">Check-out Date:</label>
                        <input type="date" name="check_out" min="{{ date('Y-m-d') }}"
                            @foreach ($bookedRanges as $range)
                                                    @if (date('Y-m-d') >= $range['check_in'] && date('Y-m-d') <= $range['check_out']) disabled
                                                    @endif @endforeach>
                        @error('check_out')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center items-center">
                        <x-primary-button>Book</x-primary-button>
                    </div>
                </form>

            </div>
            <div id="calendar"></div>


            @push('scripts')
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
                <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var calendarEl = document.getElementById('calendar');
                        var calendar = new FullCalendar.Calendar(calendarEl, {
                            initialView: 'dayGridMonth',

                            events: @json($events),
                        });
                        calendar.render();
                    });
                </script>
            @endpush
</x-app-layout>
