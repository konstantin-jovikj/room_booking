<div class="w-full">
    <div class="px-10 py-4">
        <x-link-button href="{{ route('create.building') }}">Add new Building</x-link-button>
    </div>

    @if (session()->has('error'))
        <div class="bg-rose-500 text-white py-3 px-4 mb-4 w-full">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="bg-emerald-500 text-white py-3 px-4 mb-4 w-full">
            {{ session('success') }}
        </div>
    @endif


    <div class="min-h-screen flex justify-center items-center w-full">
        <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
            @if (isset($buildings))
                @foreach ($buildings as $building)
                    <div
                        class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                        <div class="relative">


                            @if (isset($building->buildingImages) && count($building->buildingImages) > 0)
                                @foreach ($building->buildingImages as $image)
                                    <img src="{{ asset('storage/images/' . $image->building_image) }}"
                                        class="object-contain w-full rounded-xl">
                                @break
                            @endforeach
                        @else
                            <img class="w-full rounded-xl"
                                src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                                alt="Colors" />
                        @endif

                    </div>
                    <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">{{ $building->building_name }}
                    </h1>
                    <div class="my-4 w-full">
                        <div class="flex space-x-1 items-center">
                            <span>
                                <i class="fa-sharp fa-regular fa-address-book text-indigo-600 text-xl"></i>

                            </span>
                            <p>{{ $building->building_address }}</p>
                        </div>
                        <div class="flex space-x-1 items-center">
                            <span>
                                <i class="fa-solid fa-location-dot text-indigo-600 text-2xl"></i>
                            </span>
                            <p>{{ $building->building_zip }} - {{ $building->building_place }} -
                                {{ $building->building_country }}</p>
                        </div>
                        <div class="w-full flex justify-center items-center ">
                            <div class="w-1/2 px-1">
                                <x-link-button href="{{ route('create.buildingimage', $building->id) }}"
                                    class="bg-green-600 my-2 w-full text-center">Add image</x-link-button>
                            </div>
                            <div class="w-1/2 px-1">
                                <x-link-button href="{{ route('view.building', $building->id) }}"
                                    class="bg-orange-600 my-2 w-full text-center">View Building</x-link-button>
                            </div>
                        </div>
                        <div class="w-full flex justify-center items-center ">
                            <div class="w-1/2 px-1">
                                <x-link-button href="{{ route('edit.building', $building->id) }}"
                                    class="bg-indigo-600 my-2 w-full text-center">Edit Building</x-link-button>
                            </div>
                            <div class="w-1/2 px-1">
                                <form action="{{ route('delete.building', $building->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-primary-button class="bg-red-600 my-2 w-full text-center">Delete Building
                                    </x-primary-button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
</div>
