<div class="w-full sm:w-[300px] bg-gray-800  px-2 py-2">
    <div
        class="pl-12 py-2 hover:bg-gray-600 {{ request()->routeIs('index.buildings') ? 'border-b-2 border-sky-500 bg-gray-600' : 'border-b border-gray-400 bg-gray-800' }}">
        <a href="{{route('index.buildings')}}" class="text-gray-200 hover:no-underline hover:text-gray-100">Buildings</a>
    </div>
    <div
    class="pl-12 py-2 hover:bg-gray-600 {{ request()->routeIs('index.rooms') ? 'border-b-2 border-sky-500 bg-gray-600' : 'border-b border-gray-400 bg-gray-800' }}">
        <a href="{{route('index.rooms')}}" class="text-gray-200 hover:no-underline hover:text-gray-100">Rooms</a>
    </div>
    <div
    class="pl-12 py-2 hover:bg-gray-600 {{ request()->routeIs('company.view') ? 'border-b-2 border-sky-500 bg-gray-600' : 'border-b border-gray-400 bg-gray-800' }}">
        <a href="" class="text-gray-200 hover:no-underline hover:text-gray-100">Accessories</a>
    </div>
</div>
