<x-app-layout>

    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link-primary href="{{ route('child.measurements.create', ['child' => $child]) }}"><span class="babybook-plus"></span> Нова ставка</x-btn-link-primary>
            <x-btn-link href="{{ route('child.show', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>

    <!-- component -->
    <x-container>
        <div class="w-10/12 mx-auto relative py-20">
            <h1 class="text-3xl text-center font-bold text-blue-500">Сите мерења</h1>
            <div class="border-l-2 mt-10">
                @if(!$measurements->isEmpty())
                    @foreach ($measurements as $measurement)
                        <div style="background-color: {{$measurement->type ? $measurement->type->color : '#ccc'}}" class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                            <div  style="background-color: {{$measurement->type ? $measurement->type->color : '#ccc'}}" class="w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>
                            <div  style="background-color: {{$measurement->type ? $measurement->type->color : '#ccc'}}" class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>
                            <div class="flex-auto">
                                <h1 class="text-xl font-bold">{{$measurement->type ? $measurement->type->name : ''}}</h1>
                                <h3>Вредност : {{$measurement->value}} {{$measurement->unit ? $measurement->unit->name : ''}}</h3>
                                <h1 class="text-lg">Време : {{$measurement->date}}</h1>
                                @if($measurement->notes)
                                    <h3>Забелешка :  {{$measurement->notes}}</h3>
                                @endif
                            </div>
                            <a href="{{route('child.measurements.edit',['child'=>$child->id,'measurement'=>$measurement->id])}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                Промени
                            </a>
                            <form class="inline" method="POST" action="{{route('child.measurements.destroy',['child'=>$child->id,'measurement'=>$measurement->id])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" onclick=" return confirm('Дали сте сигурни ?')" value="1" name="delete" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                    Избриши
                                </button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <div>
                        <p>Не се пронајдени записи</p>
                    </div>
                @endif
                <section class="mt-4 text-center">{{ $measurements->links() }}</section>
            </div>
        </div>
    </x-container>
</x-app-layout>
