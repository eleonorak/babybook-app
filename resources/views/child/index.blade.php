<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>

        <div class="sm:col-span-4 float-right">
            <a href="{{ route('child.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" > + Додади бебе</a>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    @if($children->count() > 0)

                    @foreach($children->chunk(2) as $group)
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($group as $child)

                                    <div
                                        class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 relative shadow-xl overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform">
                                        <div class="flex items-center gap-4">
                                            <img src="{{ $child->profile_photo }}" class="w-32 group-hover:w-36 group-hover:h-36 h-32 object-center object-cover rounded-full transition-all duration-500 delay-500 transform"/>
                                            <div class="w-fit transition-all transform duration-500">
                                                <h1 class="text-white dark:text-white font-bold">
                                                    {{$child->name}}
                                                </h1>
                                                <p class="text-gray-400">
                                                   @php
                                                       $dob = $child->birth_date;
                                                       $today   = new \Carbon\Carbon('today');
                                                       $year = $dob->diff($today)->y;
                                                       $month = $dob->diff($today)->m;
                                                       /* @var \Carbon\Carbon $dob */

                                                   @endphp

                                                    @if($year > 0)
                                                    {{$year}} {{$year > 1 ? 'години': 'година'}} и
                                                    {{$month}} {{$month > 1 ? 'месеци': 'месец'}}
                                                    @else
                                                        {{$month}} {{$month > 1 ? 'месеци': 'месец'}}
                                                    @endif


                                                </p>
                                            </div>
                                        </div>
                                        <div class="absolute group-hover:bottom-1 delay-300 -bottom-16 transition-all duration-500 right-1 rounded-lg">
                                            <div class="flex justify-evenly items-center gap-2 p-2 text-white dark:text-gray-600">


                                                <a href="{{ route('child.edit', ['child' => $child->id]) }}" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                    Промени
                                                </a>


                                                <a href="#"  class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                                    Сподели
                                                </a>

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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
