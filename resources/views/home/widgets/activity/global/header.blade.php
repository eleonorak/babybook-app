<div class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white p-4">
    <div><h2 class="text-lg font-semibold font-">Aктивност</h2></div>
    <div>
        <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-4 py-2" type="button">
            <span class="sr-only">{{ $types[$view] }}</span>
            {{ $types[$view] }}
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdownAction" class="absolute z-10 hidden bg-white right-4 divide-y divide-gray-100 rounded-lg shadow w-44">
            @foreach($types as $key => $type)
                <div class="py-1 text-center">
                    <a href="{{ explode('?', url()->current())[0].'?activity='.$key }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">{{ $type }}</a>
                </div>
            @endforeach
        </div>
    </div>
</div>
