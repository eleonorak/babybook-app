<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>

        <div class="sm:col-span-4 float-right">
            <a href="{{ route('child.medical-treatments.index',['child'=>$child->id]) }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
        </div>
    </x-slot>



    @include('child.medical-treatments.forms.medical-treatment-edit')



</x-app-layout>
