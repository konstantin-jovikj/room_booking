<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="min-height: calc(100vh - 65px);">
        <x-side-nav-user></x-side-nav-user>
        {{-- <x-book-room :room="$room :bookedRanges="$bookedRanges" /> --}}

        <div class="min-w-screen flex flex-col items-start justify-center p-5 lg:p-10 relative w-full gap-4">

            <div class="p-8 bg-white w-full shadow-lg rounded-lg min-w-[380px] max-w-[650px] ">
                <h2 class="text-center text-lg font-bold text-red-800 uppercase">Book the room dates</h2>

                <form class=" mx-auto p-2 mt-2 rounded" action="{{ route('store.room.booking', $room->id) }}"
                    method="POST">
                    @csrf
                    @method('POST')
                    @if (session()->has('message'))
                        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-4 w-full flex  items-center  justify-items-end ">
                        <label for="check_in" class=" w-1/3 text-right pr-4">Check-in:</label>
                        <input type="date" name="check_in" min="{{ date('Y-m-d') }}" class="w-2/3">
                        @error('check_in')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4 w-full flex  items-center  justify-items-end ">
                        <label for="check_out" class=" w-1/3 text-right pr-4">Check-out:</label>
                        <input type="date" name="check_out" min="{{ date('Y-m-d') }}" class="w-2/3">
                        @error('check_out')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-center items-center">
                        <x-primary-button>Book</x-primary-button>
                    </div>
                </form>

            </div>
            <div id="calendar" class="max-w-[650px] bg-white p-8">

            </div>


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
        </div>
    </div>
</x-app-layout>
