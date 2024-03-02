<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link-secondary size="small" href="{{ route('child.create') }}"><span class="babybook-plus"></span> Додади бебе</x-btn-link-secondary>
        </div>
    </x-slot>

    <x-container>
        @if($children->count() > 0)
            @foreach($children->chunk(2) as $group)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($group as $child)
                        <div class="relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform">
                            <div class="flex items-center gap-4">
                                <div class="absolute delay-300 top-16 transition-all duration-500 right-1 rounded-lg">
                                    <div class="flex justify-evenly items-center gap-2 p-2 text-white">
                                        <x-btn-link-primary href="{{ route( 'child.show', ['child' => $child->id] ) }}">Детали</x-btn-link-primary>
                                    </div>
                                </div>
                                <img src="{{ $child->profile_photo }}" class="w-32 group-hover:w-36 group-hover:h-36 h-32 object-center object-cover rounded-full transition-all duration-500 delay-500 transform"/>
                                <div class="w-fit transition-all transform duration-500">
                                    <h1 class="text-gray-700 font-bold">
                                        {{$child->name}}
                                    </h1>
                                    <p class="text-gray-400">
                                        {{ $child->birth_date ? \App\Helpers\Date::age($child->birth_date) : '/' }}
                                    </p>
                                </div>
                            </div>
                            <div class="absolute group-hover:bottom-1 delay-300 -bottom-16 transition-all duration-500 right-1 rounded-lg">
                                <div class="flex justify-evenly items-center gap-2 p-2 text-white">
                                    <x-btn-link-secondary href="{{ route('child.edit', ['child' => $child->id]) }}" title="Промени">
                                        <span class="babybook-edit"></span>
                                    </x-btn-link-secondary>
                                    <form class="inline" method="POST" action="{{ route('child.destroy', ['child' => $child->id]) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <x-btn-danger type="submit" onclick="return confirm('Дали сте сигурни ?')" value="1" name="delete" title="Избриши">
                                            <span class="babybook-trash-empty"></span>
                                        </x-btn-danger>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @else
            <div class="text-center bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                <p class="font-bold">Не се пронајдени податоци за деца</p>
            </div>
        @endif
    </x-container>
</x-app-layout>
