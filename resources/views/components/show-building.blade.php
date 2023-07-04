<div class="min-w-screen flex items-center p-5 lg:p-10 relative w-full">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            @foreach ($building as $single_building)
                <div class="w-full md:flex px-10 mb-10 md:mb-0 border">
                    <div class="flex flex-wrap gap-2 w-full md:w-1/2">
                        @if (isset($single_building->buildingImages) && $single_building->buildingImages->isNotEmpty())
                            @foreach ($single_building->buildingImages as $image)
                                <div class="relative mb-2 w-full">
                                    <img src="{{ asset('storage/images/' . $image->building_image) }}"
                                        class="object-contain w-full " id="{{ $image->id }}">
                                    <form action="{{ route('delete.buildingimage', $image->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button
                                            class="absolute bg-red-600 bg-opacity-80 my-2 w-full text-right"
                                            style="top: -8px;">Delete Image</x-primary-button>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <img src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                                alt="Colors" class="w-full rounded-xl">
                        @endif
                    </div>
                    <div class="w-full md:w-1/2 px-10">
                        <div class="mb-10 w-full">
                            <div class="w-full flex justify-center items-center">
                                <div class="w-full px-1">
                                    <x-link-button href="{{ route('create.buildingimage', $single_building->id) }}"
                                        class="bg-green-600 my-2 w-full text-center">Add image</x-link-button>
                                </div>
                            </div>
                            <div class="w-full flex justify-center items-center">
                                <div class="w-1/2 px-1">
                                    <x-link-button href="{{ route('edit.building', $single_building->id) }}"
                                        class="bg-indigo-600 my-2 w-full text-center">Edit Building</x-link-button>
                                </div>
                                <div class="w-1/2 px-1">
                                    <form action="{{ route('delete.building', $single_building->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="bg-red-600 my-2 w-full text-center">Delete Building
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="inline-block align-bottom mr-5">
                                <span class="text-md leading-none align-baseline">Building Name:</span>
                                <span
                                    class="font-bold text-lg leading-none align-baseline pl-4">{{ $single_building->building_name }}</span>
                            </div>

                            <div class="inline-block align-bottom mr-5">
                                <span class="text-md leading-none align-baseline">Building Address:</span>
                                <span
                                    class="font-bold text-lg leading-none align-baseline pl-4">{{ $single_building->building_address }}</span>
                            </div>
                            <div class="inline-block align-bottom mr-5">
                                <span class="text-md leading-none align-baseline">Building ZIP:</span>
                                <span
                                    class="font-bold text-lg leading-none align-baseline pl-4">{{ $single_building->building_zip }}</span>
                            </div>
                            <div class="inline-block align-bottom mr-5">
                                <span class="text-md leading-none align-baseline">Building Place:</span>
                                <span
                                    class="font-bold text-lg leading-none align-baseline pl-4">{{ $single_building->building_place }}</span>
                            </div>
                            <div class="inline-block align-bottom mr-5">
                                <span class="text-md leading-none align-baseline">Building Country:</span>
                                <span
                                    class="font-bold text-lg leading-none align-baseline pl-4">{{ $single_building->building_country }}</span>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
