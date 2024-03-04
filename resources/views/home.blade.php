<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Почетна') }}
        </h2>
    </x-slot>

    <x-container>

        <div class="flex flex-col gap-10">
            @include(sprintf('home.widgets.activity.%s', $activity['view']), $activity)
            @include('home.widgets.charts.sleep', $sleepChart)
        </div>


    </x-container>
</x-app-layout>
