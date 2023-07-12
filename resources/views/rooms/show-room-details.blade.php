<x-app-layout>

    <div class="w-full overflow-hidden flex flex-col sm:flex-row" style="min-height: calc(100vh - 65px);">
        @if (Auth::check() && Auth::user()->role_id == 1)
            <x-side-nav></x-side-nav>
        @endif

        @if (Auth::check() && Auth::user()->role_id == 2)
            <x-side-nav-user></x-side-nav-user>
        @endif
        <x-show-room :room="$room" />

    </div>
</x-app-layout>
