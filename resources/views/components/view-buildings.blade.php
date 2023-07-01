<div class="w-full bg-gray-100 h-full">
    <div class="px-10 py-4">
        <x-link-button href="{{ route('create.building') }}">Add new Building</x-link-button>
    </div>
    @if (session()->has('error'))
        <div class="bg-rose-500 text-white py-3 px-4 mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if (session()->has('success'))
        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
            {{ session('success') }}
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 table table-striped table-bordered display mt-12"
            id="myTable">
            <thead class="text-xs text-gray-900 uppercase bg-gray-80 bg-gray-300 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Building Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Building Address
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Building ZIP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Building Country
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (isset($buildings))
                    @foreach ($buildings as $building)
                        <tr class="border-b border-sky-400 bg-gray-100">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                {{ $building->building_name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $building->building_address }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $building->building_zip }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $building->building_country }}
                            </td>
                            <td class="px-6 py-4 flex">
                                {{-- <a href=""
                                                class="font-medium  text-green-500 hover:underline" data-modal-target="defaultModal" data-modal-toggle="defaultModal">View</a> --}}
                                <a href="{{ route('create.buildingimage', $building->id) }}" class="font-medium  text-green-800 hover:underline mx-3">Add Images</a>
                                <a href="" class="font-medium  text-blue-500 hover:underline mx-3">View</a>

                                <a href="" class="font-medium  text-orange-400 hover:underline mx-3">Edit</a>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="font-medium  text-red-500 hover:underline ">Delete</button>
                                </form>



                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="border-b border-sky-400 bg-gray-100">
                        <th scope="row" class="px-6 py-4 whitespace-nowrap" colspan="6">

                            <h4 class="text-center">There are no building yet</h4>
                        </th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
