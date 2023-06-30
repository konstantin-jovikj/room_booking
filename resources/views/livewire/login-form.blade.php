<form wire:submit.prevent="authenticate" class=" mx-auto p-2 mt-2 rounded  shadow" >
    @csrf
    @if (session()->has('message'))
        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-4">
        <input type="email" class="w-full border @error('email') border-red-500 @enderror"
            wire:model.debounce.500ms="email" placeholder="Email">
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="password" class="w-full border @error('password') border-red-500 @enderror"
            wire:model.debounce.500ms="password" placeholder="Password">
        @error('password')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex justify-between items-center">
        @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        <x-primary-button>register</x-primary-button>
    </div>
    </form>
