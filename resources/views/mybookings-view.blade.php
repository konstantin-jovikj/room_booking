<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="min-height: calc(100vh - 65px);">

        <x-side-nav-user></x-side-nav-user>

        {{-- <x-room-card :buildings="$buildings" :rooms="$rooms"/> --}}
        <x-my-bookings :myBookings="$myBookings" />
    </div>
</x-app-layout>
