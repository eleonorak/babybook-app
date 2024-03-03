<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Почетна') }}
        </h2>
    </x-slot>

    <x-container>

        @include(sprintf('home.widgets.activity.%s', $activity['view']), $activity)

    </x-container>
</x-app-layout>
