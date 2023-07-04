<div class="flex justify-center items-center bg-gray-100 w-full">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Enter required room data</h2>

        <form class=" mx-auto p-2 mt-2 rounded" action="{{route('store.room')}}" method="POST">
            @csrf
            @method('POST')
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif


            <div class="mb-4">
                <select class="w-full border mb-4 @error('buildingId') border-red-500 @enderror"
                    name="buildingId" placeholder="Select a Building">
                    <option value="">Select a Building</option>
                    @foreach ($buildingsId as $building)
                        <option value="{{ $building->id }}">{{ $building->building_name }}</option>
                    @endforeach
                </select @error('buildingId') <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="text" class="w-full border @error('room_number') border-red-500 @enderror"
                    name="room_number" placeholder="Room Number">
                @error('room_number')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <input type="number" step="0.01" class="w-full border @error('room_price') border-red-500 @enderror"
                    name="room_price" placeholder="Room Price">
                @error('room_price')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <textarea  class="w-full border @error('room_description') border-red-500 @enderror"
                    name="room_description" placeholder="Room Description" rows="10">
                </textarea>
                @error('room_description')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>


            <div class="flex justify-center items-center">
                <x-primary-button>Add Room</x-primary-button>
            </div>
        </form>
    </div>
</div>
