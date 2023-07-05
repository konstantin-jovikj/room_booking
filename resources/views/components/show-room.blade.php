<div class="min-w-screen flex items-center p-5 lg:p-10 relative w-full">
    {{-- @dd($room) --}}
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            @foreach ($room as $single_room)
                <div class="w-full md:flex px-10 mb-10 md:mb-0 border">
                    <div class="flex flex-wrap gap-2 w-full md:w-1/2">
                        @if (isset($single_room->roomImages) && $single_room->roomImages->isNotEmpty())
                            @foreach ($single_room->roomImages as $image)
                                <div class="relative mb-2 w-full">
                                    <img src="{{ asset('storage/images/' . $image->room_image) }}"
                                        class="object-contain w-full " id="{{ $image->id }}">
                                    <form action="{{ route('delete.roomimage', $image->id) }}" method="POST">
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
                                    <x-link-button href="{{ route('create.roomimage', $single_room->id) }}"
                                        class="bg-green-600 my-2 w-full text-center">Add image</x-link-button>
                                </div>
                            </div>
                            <div class="w-full flex justify-center items-center">
                                <div class="w-1/2 px-1">
                                    <x-link-button href="{{ route('edit.room', $single_room->id) }}"
                                        class="bg-indigo-600 my-2 w-full text-center">Edit room</x-link-button>
                                </div>
                                <div class="w-1/2 px-1">
                                    <form action="{{ route('delete.room', $single_room->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <x-primary-button class="bg-red-600 my-2 w-full text-center">Delete Room
                                        </x-primary-button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="align-bottom mr-5 mb-2">
                                <p class="font-bold text-lg leading-none align-baseline pl-4"><span class="text-md leading-none align-baseline font-normal">Building Name : </span>{{ $single_room->building->building_name}}</p>
                            </div>

                            <div class="align-bottom mr-5 mb-2">
                                <p class="font-bold text-lg leading-none align-baseline pl-4"><span class="text-md leading-none align-baseline font-normal">Room Number : </span>{{ $single_room->room_number }}</p>
                            </div>

                            <div class="align-bottom mr-5 mb-2">
                                <p class="font-bold text-lg leading-none align-baseline pl-4 text-red-600"><span class="text-md leading-none align-baseline font-normal text-black">Price : </span>{{ $single_room->price }}</p>
                            </div>

                            <div class="align-bottom mr-5 mb-2">
                                <p class="font-bold text-lg leading-none align-baseline pl-4"><span class="text-md leading-none align-baseline font-normal">Room Description : </span>{{ $single_room->room_description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
