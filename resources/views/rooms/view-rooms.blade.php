<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="min-height: calc(100vh - 65px);">
        <x-side-nav></x-side-nav>
        <x-room-card :buildings="$buildings" :rooms="$rooms"/>

    </div>
</x-app-layout>
