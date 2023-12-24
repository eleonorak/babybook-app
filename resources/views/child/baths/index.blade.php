<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>

        <div class="sm:col-span-4 float-right">
            <a href="{{route('child.baths.create',['child'=>$child->id])}}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"> + Додади капење</a>
        </div>
    </x-slot>

    <!-- component -->
    <div class="w-10/12 md:w-7/12 lg:6/12 mx-auto relative py-20">
        <h1 class="text-3xl text-center font-bold text-blue-500">Сите капења</h1>
        <div class="border-l-2 mt-10">
            <!-- Card 1 -->

            @if(!$baths->isEmpty())

                @foreach ($baths as $bath)
                    <div style="background-color: #7c3aed"
                        class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
                        <!-- Dot Follwing the Left Vertical Line -->
                        <div  style="background-color: #8b5cf6"
                            class="w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

                        <!-- Line that connecting the box with the vertical line -->
                        <div  style="background-color: #8b5cf6"
                            class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>

                        <!-- Content that showing in the box -->
                        <div class="flex-auto">
                            <h1 class="text-xl font-bold">Капење</h1>
                            <h1 class="text-lg">Датум и време : {{$bath->date}}</h1>
                            <h2>Забелешка :  {{$bath->notes}}</h2>
                        </div>
                        <a href="{{route('child.baths.edit',['child'=>$child->id,'bath'=>$bath->id])}}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            Промени
                        </a>
                        <form class="inline" method="POST" action="{{route('child.baths.destroy',['child'=>$child,'bath'=>$bath->id])}}">
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

            <section class="mt-4 text-center">{{ $baths->links() }}
            </section>


        </div>
    </div>
</x-app-layout>
