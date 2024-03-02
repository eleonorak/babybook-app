<x-app-layout>
    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link-secondary size="small" href="{{ route('child.diaper-changes.create', ['child' => $child]) }}"><span class="babybook-plus"></span> Нова ставка</x-btn-link-secondary>
            <x-btn-link href="{{ route('child.show', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>

    <!-- component -->
    <x-container>
        <div class="w-10/12 mx-auto relative py-20">
            <h1 class="text-3xl text-center font-bold text-gray-700">Промени на пелени</h1>
            <div class="border-l-2 mt-10">
                @if(!$diaperChanges->isEmpty())
                    @foreach ($diaperChanges as $diaperChange)
                        <div style="background-color: #7c3aed" class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 text-white rounded mb-8 flex-col md:flex-row space-y-4 md:space-y-0">
                            <div  style="background-color: #8b5cf6" class="w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>
                            <div  style="background-color: #8b5cf6" class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>
                            <div class="flex-auto">
                                <h1 class="text-xl font-bold">Променета пелена </h1>
                                <h1 class="text-lg">Време : {{\App\Helpers\Date::format($diaperChange->date)}}</h1>
                                @if($diaperChange->notes)
                                    <h2>Забелешка :  {{$diaperChange->notes}}</h2>
                                @endif
                            </div>
                            <x-btn-link-secondary href="{{route('child.diaper-changes.edit',['child'=> $child->id,'diaper_change'=>$diaperChange->id])}}" title="Промени">
                                <span class="babybook-edit"></span> Промени
                            </x-btn-link-secondary>
                            <form class="inline" method="POST" action="{{route('child.diaper-changes.destroy',['child'=>$child->id,'diaper_change'=>$diaperChange->id])}}">
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
                <section class="mt-4 text-center">{{ $diaperChanges->links() }}</section>
            </div>
        </div>
    </x-container>
</x-app-layout>
