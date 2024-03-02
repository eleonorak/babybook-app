<x-app-layout>
    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link href="{{  isset($measurementType) && $measurementType ? route('child.measurements.create',['child'=>$child->id]) : route('child.measurements.index', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>

    @if($measurementType)
        @include('child.measurements.forms.measurement-create')
    @else
        @include('child.measurements.forms.measurement-types')
    @endif
</x-app-layout>



