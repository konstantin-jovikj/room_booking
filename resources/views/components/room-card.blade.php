<div class="w-full">
    {{-- <div class="px-10 py-4">
        <x-link-button href="{{ route('create.room') }}">Add Room</x-link-button>
    </div> --}}
    @if (Auth::check() && Auth::user()->role_id == 1)
        @if (isset($buildings) && count($buildings) == 0)
            <h2 class="text-xl pl-10 bg-orange-500 text-white p-2">
                You have to add building and then you can add rooms
            </h2>
        @else
            <h2 class="text-xl pl-10 bg-emerald-500 text-white p-2">
                You have {{ count($buildings) }} building(s) available
            </h2>
        @endif
    @endif

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


    {{-- ROOM CARD --}}
    @if (Auth::check() && Auth::user()->role_id == 1)
        @if (isset($buildings) && count($buildings) != 0)
            <div class="px-10 py-4">
                <x-link-button href="{{ route('create.room') }}">Add Room</x-link-button>
            </div>
        @endif
    @endif

    @if (isset($rooms) && count($rooms) == 0)

        <div class="bg-red-500">
            <p class="text-xl pl-10">You dont have any rooms added yet. Please add a room.</p>
        </div>
    @elseif (count($buildings) != 0)
        {{-- Rooms are added --}}


        <div class="min-h-screen flex justify-center items-center w-full">
            <div class="md:px-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-5 space-y-4 md:space-y-0">
                @if (isset($rooms))
                    @foreach ($rooms as $room)
                        <div
                            class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-500">

                            <div class="relative">


                                @if (isset($room->roomImages) && count($room->roomImages) > 0)
                                    @foreach ($room->roomImages as $image)
                                        <img src="{{ asset('storage/images/' . $image->room_image) }}"
                                            class="object-contain w-full rounded-xl">
                                    @break
                                @endforeach
                            @else
                                <img class="w-full rounded-xl"
                                    src="https://images.unsplash.com/photo-1541701494587-cb58502866ab?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
                                    alt="Colors" />
                            @endif

                        </div>
                        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">
                            {{ $room->building->building_name }}
                        </h1>
                        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer"><span>Room
                                Number:</span>{{ $room->room_number }}
                        </h1>
                        <div class="my-4 w-full">
                            <div class="flex space-x-1 items-center">
                                <span>
                                    <i class="fa-solid fa-pen-to-square text-indigo-600 text-xl"></i>
                                </span>
                                <div>{{ $room->room_description }}</div>
                            </div>

                            <div class="flex space-x-1 items-center">
                                <span>
                                    <i class="fa-solid fa-euro-sign text-red-600 text-xl"></i>
                                </span>
                                <p class="text-red-500 text-xl font-extrabold">{{ $room->price }}</p>
                            </div>

                            {{-- ADMIN BUTTONS --}}
                            @if (Auth::check() && Auth::user()->isAdmin())
                                <div>
                                    <div class="w-full flex justify-center items-center ">
                                        <div class="w-1/2 px-1">
                                            <x-link-button href="{{ route('create.roomimage', $room->id) }}"
                                                class="bg-green-600 my-2 w-full text-center">Add image
                                            </x-link-button>
                                        </div>
                                        <div class="w-1/2 px-1">
                                            <x-link-button href="{{ route('view.room', $room->id) }}"
                                                class="bg-orange-600 my-2 w-full text-center">View Room
                                            </x-link-button>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-center items-center ">
                                        <div class="w-1/2 px-1">
                                            <x-link-button href="{{ route('edit.room', $room->id) }}"
                                                class="bg-indigo-600 my-2 w-full text-center">Edit Room
                                            </x-link-button>
                                        </div>
                                        <div class="w-1/2 px-1">
                                            <form action="{{ route('delete.building', $room->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button class="bg-red-600 my-2 w-full text-center">Delete
                                                    Room
                                                </x-primary-button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
@endif
</div>
