<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>


    @if($measurementType)


            <div class="sm:col-span-4 float-right px-2">
                <a href="{{ route('child.measurements.create',['child'=>$child->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
            </div>
        </x-slot>
        @include('child.measurements.forms.measurement-create')

    @else
            <div class="sm:col-span-4 float-right px-2">
                <a href="{{ route('child.measurements.index',['child'=>$child->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
            </div>
        </x-slot>
        @include('child.measurements.forms.measurement-types')
    @endif

</x-app-layout>


