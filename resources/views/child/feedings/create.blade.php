<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>


    @if($feedingType)


            <div class="sm:col-span-4 float-right px-2">
                <a href="{{ route('child.feedings.create',['child'=>$child->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
            </div>
        </x-slot>
        @include('child.feedings.forms.feeding-create')

    @else
        <div class="sm:col-span-4 float-right px-2">
                <a href="{{ route('child.feedings.index',['child'=>$child->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
            </div>
        </x-slot>
        @include('child.feedings.forms.feeding-types')
    @endif





    {{-- Tailwind CSS --}}

    <div class="bg-red w-[100px] h-[100px]">Hello World</div>


    {{-- Традиционален CSS --}}
    <style>
        .box {
            background-color: red;
            width: 100px;
            height: 100px;
        }
    </style>
    <div class="box">Hello World</div>




</x-app-layout>
