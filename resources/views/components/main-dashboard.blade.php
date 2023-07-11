<div class="w-full bg-gray-100 h-full">

    <div class="w-full flex flex-col sm:flex-row">

        <div
            class=" w-full sm:w-1/3 h-[150px] bg-emerald-100 text-emerald-700 p-12 m-4 rounded-xl shadow-lg text-center border-2 border-emerald-500">

            <h2 class="text-2xl ">
                You have {{ count($rooms) }} rooms in {{ count($buildings) }} building(s) available .
            </h2>
        </div>

        <div
            class="w-full sm:w-1/3 h-[150px] bg-blue-100 text-blue-500 p-12 m-4 rounded-xl shadow-lg text-center border-2 border-blue-500">
            <h2 class="text-2xl text-center">
                There are {{ count($users) }} Registered users.
            </h2>
        </div>
        <div
            class="w-full sm:w-1/3 p-6 mt-4 border-2 border-orange-500  bg-orange-100 text-orange-500   rounded-xl shadow-lg h-[150px] ">
            @php
                $i = 0;
                $j = 0;
                $k = 0;
            @endphp
            @foreach ($bookings as $booking)
                @foreach ($booking->users as $userBook)
                    @php
                        if ($userBook->pivot->check_out < now()) {
                            $i++;
                        }

                        if ($userBook->pivot->check_in > now() && $userBook->pivot->check_out > now()) {
                            $j++;
                        }

                        if ($userBook->pivot->check_in < now() && $userBook->pivot->check_out > now()) {
                            $k++;
                        }

                    @endphp
                @endforeach
            @endforeach
            <p class="text-xl text-center ">
                Past booking(s): {{ $i }}
            </p>
            <p class="text-xl text-center ">
                Upcoming Booking(s) {{ $j }}
            </p>
            <p class="text-xl text-center ">
                Active Booking(s) {{ $k }}
            </p>
        </div>
    </div>
    {{-- @dd($bookings) --}}
    <div class=" m-4">
        <table class="min-w-full divide-y divide-gray-200 shadow">
            <thead class="bg-sky-200 rounded-xl border-b-4 border-sky-700">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Name and
                        Surname</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">E-mail</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Phone</th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Room </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Check-In
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Check-Out
                    </th>
                    <th class="px-6 py-4 text-left text-xs font-medium text-gray-800 uppercase">Actions
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $booking)
                    @foreach ($booking->users as $userBook)
                        <tr class="border-b">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->first_name }} {{ $userBook->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $booking->room_number }} / {{ $booking->building->building_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->pivot->check_in }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->pivot->check_out }}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                @if ($userBook->pivot->check_out < now())
                                    <form method="POST" action="{{ route('delete.booking', $userBook->pivot->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 uppercase"
                                            href="#">Delete</button>
                                    </form>
                                @endif
                                @if ($userBook->pivot->check_in > now() && $userBook->pivot->check_out > now())
                                    <p class="text-indigo-700 uppercase font-bold">Future Booking</p>
                                @endif

                                @if ($userBook->pivot->check_in < now() && $userBook->pivot->check_out > now())
                                    <p class="text-green-700 uppercase font-bold">Still Active</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
