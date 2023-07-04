<div class="flex justify-center items-center bg-gray-100 w-full" style="height: calc(100vh - 65px);"">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Update building data</h2>
        {{-- @if ($updateMode) --}}
        <form wire:submit.prevent="update" class=" mx-auto p-2 mt-2 rounded ">
            @csrf
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif

                {{-- @dd($building) --}}
            <div class="mb-4">
                <input type="text" class="w-full border @error('building.name') border-red-500 @enderror" wire:model.debounce.500ms="building.building_name" >
                @error('building.building_name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('building_address') border-red-500 @enderror"
                    wire:model.debounce.500ms="building.building_address">
                @error('building.building_address')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <input type="text" class="w-full border @error('building_zip') border-red-500 @enderror"
                    wire:model.debounce.500ms="building.building_zip">
                @error('building.building_zip')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('building_zip') border-red-500 @enderror"
                    wire:model.debounce.500ms="building.building_place">
                @error('building.building_place')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('building_country') border-red-500 @enderror"
                    wire:model.debounce.500ms="building.building_country">
                @error('building.building_country')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center items-center">
                <x-primary-button>Update</x-primary-button>

            </div>
        </form>

    </div>
</div>
