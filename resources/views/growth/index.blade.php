<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Раст и развој') }}
        </h2>
    </x-slot>

    <x-container>
        @php
            $active = 1;
        @endphp
        <div class="md:flex  tabs">
            <ul class="tabs-nav flex-column space-y space-y-4 text-sm font-medium text-gray-500 md:me-4 mb-4 md:mb-0 min-w-[140px] text-center">
                @foreach($items as $item)
                    <li class="tabs-nav-item {{ $item->number === $active ? 'active' : 'inactive' }}">
                        <a href="#" class="inline-flex items-center px-4 py-1.5 rounded-lg w-full" aria-current="page">
                            <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                            </svg>
                            {{ sprintf('Месец %d', $item->number) }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <div class="tabs-content p-6 bg-white overflow-hidden shadow-sm sm:rounded-lg w-full">
                @foreach($items as $item)
                    <div class="tabs-content-item {{ $item->number === $active ? 'active' : 'inactive' }}">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">{{ sprintf('Напредување на бебето во месец %d', $item->number) }}</h2>
                        {!! \App\Helpers\Strings::nl2p($item->content) !!}
                    </div>
                @endforeach
            </div>
        </div>
    </x-container>

</x-app-layout>
