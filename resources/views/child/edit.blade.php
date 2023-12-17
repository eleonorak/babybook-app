
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мое бебе') }}
        </h2>
    </x-slot>


    @include('child.forms.edit')

</x-app-layout>
