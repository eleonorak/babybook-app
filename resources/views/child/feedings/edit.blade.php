<x-app-layout>
    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link href="{{  isset($feedingType) && $feedingType ? route('child.feedings.create',['child'=>$child->id]) : route('child.feedings.index', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>
    @include('child.feedings.forms.feeding-edit')
</x-app-layout>
