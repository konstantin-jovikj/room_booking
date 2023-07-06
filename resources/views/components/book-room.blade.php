{{-- @dd($bookedRanges) --}}
<div class="min-w-screen flex items-center p-5 lg:p-10 relative w-full">



    @foreach ($room as $single_room)
        <div class="w-full md:flex px-10 mb-10 md:mb-0">

            <div class="w-full md:w-1/2 px-10">



                <div
                    class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
                    <div class="md:flex items-center -mx-10">

                        <div class="flex justify-center items-center bg-gray-100 w-full">
                            <div class="p-8 bg-white w-1/2 shadow-lg rounded-lg">
                                <h2 class="text-center text-lg font-bold text-red-800 uppercase">Book the room</h2>

                                <form class=" mx-auto p-2 mt-2 rounded"
                                    action="{{ route('store.room.booking', $single_room) }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @if (session()->has('message'))
                                        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
                                            {{ session('message') }}
                                        </div>
                                    @endif

                                    <div class="mb-4">
                                        <input type="date" name="check_in" min="{{ date('Y-m-d') }}"
                                            @foreach ($bookedRanges as $range)
                                            @if (date('Y-m-d') >= $range->check_in && date('Y-m-d') <= $range->check_out)
                                                disabled
                                            @endif @endforeach>
                                        @error('check_in')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-4">
                                        <input type="date" name="check_out" min="{{ date('Y-m-d') }}"
                                            @foreach ($bookedRanges as $range)
                                            @if (date('Y-m-d') >= $range->check_in && date('Y-m-d') <= $range->check_out)
                                                disabled
                                            @endif @endforeach>
                                        @error('check_out')
                                            <span class="text-red-500">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="flex justify-center items-center">
                                        <x-primary-button>Book</x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </div>


                    </div>
                </div>
    @endforeach
</div>

