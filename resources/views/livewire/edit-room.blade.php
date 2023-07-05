<div class="flex justify-center items-center bg-gray-100 w-full" style="height: calc(100vh - 65px);"">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Update Room data</h2>
        {{-- @if ($updateMode) --}}
        <form wire:submit.prevent="update" class=" mx-auto p-2 mt-2 rounded ">
            @csrf
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif

                {{-- @dd($room) --}}

            {{-- SELECT BUILDING--}}

            {{-- <div class="mb-4">
                <select class="w-full border mb-4 @error('buildingId') border-red-500 @enderror"
                    name="buildingId" placeholder="Select a Building">
                    <option value="">Select a Building</option>
                    @foreach ($buildingsId as $building)
                        <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                    @endforeach
                </select @error('buildingId') <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div> --}}

            {{-- SELECT BUILDING--}}

            <div class="mb-4">
                <input type="text" class="w-full border @error('room.number') border-red-500 @enderror" wire:model.debounce.500ms="room.room_number" >
                @error('room.room_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('room_description') border-red-500 @enderror"
                    wire:model.debounce.500ms="room.room_description">
                @error('room.room_description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="mb-4">
                <input type="number" class="w-full border @error('room_price') border-red-500 @enderror"
                    wire:model.debounce.500ms="room.price">
                @error('room.room_price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center items-center">
                <x-primary-button>Update</x-primary-button>

            </div>
        </form>

    </div>
</div>
