<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- First Name -->
        <div>
            <x-input-label for="first_name" :value="__('First Name')" />
            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')"
                required autofocus autocomplete="first_name" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div>
            <x-input-label for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')"
                required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Phone -->

        <div>
            <x-input-label for="phone" :value="__('Phone')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                required autofocus autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Address -->

        <div>
            <x-input-label for="user_address" :value="__('Address')" />
            <x-text-input id="user_address" class="block mt-1 w-full" type="text" name="user_address"
                :value="old('user_address')" required autofocus autocomplete="user_address" />
            <x-input-error :messages="$errors->get('user_address')" class="mt-2" />
        </div>

        <!-- ZIP -->

        <div>
            <x-input-label for="user_zip" :value="__('Zip/Postal Code')" />
            <x-text-input id="user_zip" class="block mt-1 w-full" type="text" name="user_zip" :value="old('user_zip')"
                required autofocus autocomplete="user_zip" />
            <x-input-error :messages="$errors->get('user_zip')" class="mt-2" />
        </div>


        <!-- Place -->

        <div>
            <x-input-label for="user_place" :value="__('Place')" />
            <x-text-input id="user_place" class="block mt-1 w-full" type="text" name="user_place" :value="old('user_place')"
                required autofocus autocomplete="user_place" />
            <x-input-error :messages="$errors->get('user_place')" class="mt-2" />
        </div>

        <!-- Country -->

        <div>
            <x-input-label for="user_country" :value="__('Country')" />
            <x-text-input id="user_country" class="block mt-1 w-full" type="text" name="user_country" :value="old('user_country')"
                required autofocus autocomplete="user_country" />
            <x-input-error :messages="$errors->get('user_country')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    {{-- <livewire:register-form/> --}}
</x-guest-layout>
