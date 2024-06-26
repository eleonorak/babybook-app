<x-app-layout>
    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link href="{{  isset($medicalTreatmentType) && $medicalTreatmentType ? route('child.medical-treatments.create',['child'=>$child->id]) : route('child.medical-treatments.index', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>
    @if($medicalTreatmentType)
        @include('child.medical-treatments.forms.medical-treatment-create')
    @else
        @include('child.medical-treatments.forms.medical-treatment-types')
    @endif
</x-app-layout>
