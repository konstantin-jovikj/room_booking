<div class="flex justify-center items-center bg-gray-100 w-full">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Enter required room data</h2>

        <form wire:submit.prevent="register" class=" mx-auto p-2 mt-2 rounded ">
            @csrf
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif


            <div class="mb-4">
                <select class="w-full border mb-4 @error('buildingId') border-red-500 @enderror"
                    placeholder="Select a Building" name="buildingId">
                    <option value="">Select a Building</option>
                    @foreach ($buildingId as $building)
                        <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                    @endforeach
                </select>
                @error('buildingId')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('room_number') border-red-500 @enderror"
                    wire:model.debounce.500ms="room_number" placeholder="Room Number">
                @error('room_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <textarea class="w-full border @error('room_description') border-red-500 @enderror"
                    wire:model.debounce.500ms="room_description" placeholder="Room Description" rows="10">
                </textarea>
                @error('room_description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex justify-center items-center">
                <x-primary-button>Add</x-primary-button>
            </div>
        </form>
    </div>
</div>
