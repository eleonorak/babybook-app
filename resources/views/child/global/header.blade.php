<div class="flex inline-flex items-center gap-4">
    <img class="w-8 h-8 rounded-full" src="{{ $child->profile_photo }}" alt="">
    <div class="font-medium">
        <div>{{ $child->name }}</div>
    </div>
</div>

<div class="flex inline-flex items-center gap-4 float-right">
    @if(request()->routeIs('child.*.index'))
        <a href="{{route(str_replace('.index', '', request()->route()->getName()).'.create',['child'=>$child->id])}}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-4 rounded">
            <span class="babybook-plus"></span>
            Нова ставка
        </a>
    @endif
    <a href="{{ route('child.index') }}" class="text-gray-600 hover:text-blue-700 py-1 px-4 rounded">
        <span class="babybook-angle-left"></span>
        Назад
    </a>
</div>
