<x-app-layout>
    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="height: calc(100vh - 65px);">
        {{-- @dd($buildingsId) --}}
        <x-room-add-form :buildingsId="$buildingsId" />
    </div>
</x-app-layout>
