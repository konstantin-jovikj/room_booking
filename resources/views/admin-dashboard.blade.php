<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="height: calc(100vh - 65px);">
        <x-side-nav></x-side-nav>

        <x-main-dashboard :buildings="$buildings" :rooms="$rooms" :users="$users" :bookings="$bookings"/>
    </div>
</x-app-layout>
