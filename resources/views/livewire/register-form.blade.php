<form wire:submit.prevent="register" class=" mx-auto p-4 mt-4 rounded border shadow" >
    @csrf
    @if (session()->has('message'))
        <div class="bg-emerald-500 text-white py-3 px-4 mb-4">
            {{ session('message') }}
        </div>
    @endif


    <div class="mb-4">
        <input type="text" class="w-full border @error('first_name') border-red-500 @enderror"
            wire:model.debounce.500ms="first_name" placeholder="First Name">
        @error('first_name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="text" class="w-full border @error('last_name') border-red-500 @enderror"
            wire:model.debounce.500ms="last_name" placeholder="Last Name">
        @error('last_name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

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

    <div class="mb-4">
        <input type="text" class="w-full border @error('phone') border-red-500 @enderror"
            wire:model.debounce.500ms="phone" placeholder="Phone">
        @error('phone')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="text" class="w-full border @error('user_address') border-red-500 @enderror"
            wire:model.debounce.500ms="user_address" placeholder="User Address">
        @error('user_address')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="text" class="w-full border @error('user_zip') border-red-500 @enderror"
            wire:model.debounce.500ms="user_zip" placeholder="User Zip">
        @error('user_zip')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="text" class="w-full border @error('user_place') border-red-500 @enderror"
            wire:model.debounce.500ms="user_place" placeholder="User Place">
        @error('user_place')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <input type="text" class="w-full border @error('user_country') border-red-500 @enderror"
            wire:model.debounce.500ms="user_country" placeholder="User Country">
        @error('user_country')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>




    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded text-white">Submit</button>
</form>
