<div class="flex justify-center items-center bg-gray-100 w-full">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Enter required building data</h2>

        <form wire:submit.prevent="register" class=" mx-auto p-2 mt-2 rounded ">
            @csrf
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif


            <div class="mb-4">
                <input type="text" class="w-full border @error('building_name') border-red-500 @enderror"
                    wire:model.debounce.500ms="building_name" placeholder="Building Name">
                @error('building_name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('building_address') border-red-500 @enderror"
                    wire:model.debounce.500ms="building_address" placeholder="Building Address">
                @error('building_address')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <input type="text" class="w-full border @error('building_zip') border-red-500 @enderror"
                    wire:model.debounce.500ms="building_zip" placeholder="Building ZIP">
                @error('building_zip')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('building_country') border-red-500 @enderror"
                    wire:model.debounce.500ms="building_country" placeholder="Building Country">
                @error('building_country')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center items-center">
                <x-primary-button>Add</x-primary-button>
            </div>
        </form>
    </div>
</div>
