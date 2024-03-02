<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link href="{{ route('child.index') }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>
    @include('child.forms.create')
</x-app-layout>
