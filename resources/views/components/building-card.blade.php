<div class="">
    <div class="px-10 py-4">
        <x-link-button href="{{ route('create.building') }}">Add new Building</x-link-button>
    </div>

    <div class="min-h-screen flex justify-center items-center py-20">
        <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
            @if (isset($buildings))
                @foreach ($buildings as $building)
                    <div
                        class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">
                        {{-- <h3 class="mb-3 text-xl font-bold text-indigo-600">Beginner Friendly</h3> --}}
                        <div class="relative">
                            {{-- <img class="w-full rounded-xl"
                            src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                            alt="Colors" /> --}}

                            @if (isset($building->buildingImages))
                                @foreach ($building->buildingImages as $image)
                                    <img src="{{ asset('storage/images/' . $image->building_image) }}"
                                        class="object-contain w-full rounded-xl">
                                        @break
                                @endforeach
                            @else
                                <span>No image found!</span>
                            @endif
                            {{-- <p
                            class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 rounded-br-lg rounded-tl-lg">
                            FREE</p> --}}
                        </div>
                        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">{{ $building->building_name }}
                        </h1>
                        <div class="my-4">
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </span>
                                <p>1:34:23 Minutes</p>
                            </div>
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </span>
                                <p>3 Parts</p>
                            </div>
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 mb-1.5"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </span>
                                <p>Vanilla JS</p>
                            </div>
                            <x-link-button href="{{ route('create.buildingimage', $building->id) }}">Add image
                            </x-link-button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
