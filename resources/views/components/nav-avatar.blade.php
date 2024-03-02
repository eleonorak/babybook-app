@props(['photo', 'name'])

<div class="flex inline-flex items-center gap-4">
    <img class="w-8 h-8 rounded-full" src="{{ $photo }}" alt="">
    <div class="font-medium">
        <div>{{ $name }}</div>
    </div>
</div>
