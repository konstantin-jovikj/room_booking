<div class="flex justify-center items-center bg-gray-100 w-full">
    <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
        <h2 class="text-center text-lg font-bold text-red-800 uppercase">Select building image</h2>

        <form class=" mx-auto p-2 mt-2 rounded " method="POST" action="{{route('store.buildingimage', $building)}}">
            @csrf
            @if (session()->has('message'))
                <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                    {{ session('message') }}
                </div>
            @endif


            <div class="mb-4">
                <input type="file" class="w-full border @error('building_image') border-red-500 @enderror"
                    name="building_image" placeholder="Building Image">
                @error('building_image')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-center items-center">
                <x-primary-button wire:click="upload">Upload</x-primary-button>
            </div>
        </form>
    </div>
</div>
