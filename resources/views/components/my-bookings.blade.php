<div class="w-full bg-gray-100 h-full">
    <div class="bg-white w-full p-12" style="min-height: calc(100vh - 65px);">
        <h2 class="text-xl uppercase font-bold text-emerald-700">My Bookings</h2>
        {{-- @dd($myBookings) --}}
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <h4 class="py-2 text-center font-bold text-indigo-300">You have made {{ count($myBookings) }}
                        bookings so far</h4>
                    <div class="border rounded-lg shadow overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-sky-200">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">
                                        Hotel/Villa Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase">
                                        Check-in Date</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase ">
                                        Check-Out Date</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase ">
                                        Room Number</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-800 uppercase ">
                                        Price</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-right text-xs font-medium text-gray-800 uppercase ">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-sky-200">
                                @foreach ($myBookings as $myBooking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $myBooking->building->building_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                            {{ \Carbon\Carbon::parse($myBooking->pivot->check_in)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                            {{ \Carbon\Carbon::parse($myBooking->pivot->check_out)->format('d-m-Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                            {{ $myBooking->room_number }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 ">
                                            {{ $myBooking->price }} Eur</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            @if ($myBooking->pivot->check_out < now())
                                            <form method="POST"
                                                action="{{ route('delete.booking', $myBooking->pivot->id) }}">
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
                            </tbody>
                        </table>
                    </div>
                    <p class="py-2  font-bold text-indigo-700">Active Bookings cannot be deleted</p>
                </div>
            </div>
        </div>

    </div>
