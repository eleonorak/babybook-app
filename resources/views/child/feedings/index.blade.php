<x-app-layout>
    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link-secondary size="small" href="{{ route('child.feedings.create', ['child' => $child]) }}"><span class="babybook-plus"></span> Нова ставка</x-btn-link-secondary>
            <x-btn-link href="{{ route('child.show', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>

    <!-- component -->
    <x-container>
        <div class="w-10/12 mx-auto relative py-20">
            <h1 class="text-3xl text-center font-bold text-gray-700">Хранења</h1>
            <div class="border-l-2 mt-10">
                @if(!$feedings->isEmpty())
                    @foreach ($feedings as $feeding)
                        <div style="border-color: {{  $feeding->type ? $feeding->type->color : '#f0f0f0' }}" class="border-l-8 bg-white shadow transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 rounded mb-8 flex-col md:flex-row space-y-4 md:space-y-0">
                            <div class="bg-white shadow w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>
                            <div class="bg-white shadow w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>
                            <div class="flex-auto">
                                <h1 class="text-xl font-bold">{{$feeding->type ? $feeding->type->name : ''}}</h1>
                                @php
                                    $isMeasurable =  $feeding->type ? $feeding->type->measurable : false;
                                @endphp
                                @if($isMeasurable == 1 )
                                    <h3>Количина : {{$feeding->quantity}} {{$feeding->unit ? $feeding->unit->name : ''}}</h3>
                                @endif
                                <h2 class="text-lg">Време : {{\App\Helpers\Date::format($feeding->date)}}</h2>
                                @if($feeding->notes)
                                    <h3>Забелешка :  {{$feeding->notes}}</h3>
                                @endif
                            </div>
                            <x-btn-link-secondary href="{{route('child.feedings.edit',['child'=> $child->id,'feeding'=>$feeding->id])}}" title="Промени">
                                <span class="babybook-edit"></span> Промени
                            </x-btn-link-secondary>
                            <form class="inline" method="POST" action="{{ route('child.feedings.destroy', ['child' => $child->id, 'feeding' => $feeding->id])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <x-btn-danger type="submit" onclick=" return confirm('Дали сте сигурни ?')" value="1" name="delete" title="Избриши">
                                    <span class="babybook-trash-empty"></span> Избриши
                                </x-btn-danger>
                            </form>
                        </div>
                    @endforeach
                @else
                    <div>
                        <p>Не се пронајдени записи</p>
                    </div>
                @endif
                <section class="mt-4 text-center">{{ $feedings->links() }}</section>
            </div>
        </div>
    </x-container>
</x-app-layout>
