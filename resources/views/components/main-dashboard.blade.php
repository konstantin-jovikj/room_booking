<div class="w-full bg-gray-100 h-full">
    <h2 class="text-2xl bg-emerald-500 text-white p-12 m-4 rounded-xl shadow-lg text-center">
        You have {{ count($rooms) }} rooms in {{ count($buildings) }} building(s) available .
    </h2>

    <div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-sky-200">
                <tr>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Name and
                        Surname</th>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">E-mail</th>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Phone</th>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Check-In
                    </th>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Check-Out
                    </th>
                    <th cope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">Actions
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $booking)
                    @foreach ($booking->users as $userBook)


                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->first_name }} {{ $userBook->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->pivot->check_in }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                {{ $userBook->pivot->check_out }}</td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                @if ($userBook->pivot->check_out < now())
                                    <form method="POST" action="{{ route('delete.booking', $userBook->pivot->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700"
                                            href="#">Delete</button>
                                    @else
                                        <p class="text-green-700 uppercase font-bold">Still Active</p>
                                @endif

                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
