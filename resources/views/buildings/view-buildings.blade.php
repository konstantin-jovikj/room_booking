<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="height: calc(100vh - 65px);">
        <x-side-nav></x-side-nav>

        {{-- <x-view-buildings :buildings="$buildings"></x-view-buildings> --}}
        <x-building-card :buildings="$buildings" :cardImage="$cardImage" />
    </div>
</x-app-layout>
