<div class="w-full sm:w-[300px] bg-slate-800  px-2 py-2">
    <div
        class="pl-12 py-2 hover:bg-slate-600 {{ request()->routeIs('index.buildings') ? 'border-b-2 border-sky-500 bg-slate-600' : 'border-b border-gray-400 bg-slate-800' }}">
        <a href="{{route('index.buildings')}}" class="text-gray-200 hover:no-underline hover:text-gray-100">Buildings</a>
    </div>
    <div
    class="pl-12 py-2 hover:bg-slate-600 {{ request()->routeIs('company.edit') ? 'border-b-2 border-sky-500 bg-slate-600' : 'border-b border-gray-400 bg-slate-800' }}">
        <a href="" class="text-gray-200 hover:no-underline hover:text-gray-100">Rooms</a>
    </div>
    <div
    class="pl-12 py-2 hover:bg-slate-600 {{ request()->routeIs('company.view') ? 'border-b-2 border-sky-500 bg-slate-600' : 'border-b border-gray-400 bg-slate-800' }}">
        <a href="" class="text-gray-200 hover:no-underline hover:text-gray-100">Accessories</a>
    </div>
</div>
