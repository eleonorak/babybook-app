<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>

        <div class="sm:col-span-4 float-right">
            <a href=""
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> + Додади хранење</a>
        </div>
    </x-slot>


    @if($measurementType)
        @include('child.measurements.forms.measurement-create')

    @else
        @include('child.measurements.forms.measurement-types')
    @endif

</x-app-layout>
