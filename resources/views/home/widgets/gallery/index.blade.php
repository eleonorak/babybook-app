@php

@endphp

<div class="relative overflow-visible shadow-md sm:rounded-lg bg-white">
    <div
        class="flex items-center justify-between border-b flex-col flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white p-4">
        <div><h2 class="text-lg font-semibold font-">Најново од галерија</h2></div>
    </div>
    <div class="p-4">
        @if($gallery['photos']->count() > 0)
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($gallery['photos'] as $photo)
                <a href="{{ $photo->url }}" target="_blank" class="cursor-pointer relative h-48 rounded bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden bg-cover bg-no-repeat" style="background-image: url({{ $photo->url }})">
                </a>
                @endforeach
            </div>
        @else
            @include('home.global.no-data')
        @endif
    </div>
</div>




