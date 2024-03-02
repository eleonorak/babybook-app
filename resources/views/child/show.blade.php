<x-app-layout>
    <x-slot name="header">
        @include('child.global.header', ['child' => $child])
    </x-slot>

    <x-container>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.feedings.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('babybottle.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Хранење</h2>
                </a>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.diaper-changes.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('babydiaper.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Пелени</h2>
                </a>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.baths.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('babybath.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Капење</h2>
                </a>
            </div>

        </div>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.sleep-periods.index',['child'=> $child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('sleepingbaby.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Спиење</h2>
                </a>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.measurements.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500  hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('measurement.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Мерења</h2>
                </a>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.medical-treatments.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('hospitalsymbol.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Здравје</h2>
                </a>
            </div>

        </div>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <a href="{{route('child.gallery.index',['child'=>$child->id])}}" class="block relative shadow bg-white overflow-hidden hover:shadow-2xl group rounded-xl p-5 transition-all duration-500 transform hover:bg-gradient-to-br hover:from-red-200 hover:via-red-300 hover:to-yellow-200">
                    <img  src="{{ Vite::image('photogalery.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Галерија</h2>
                </a>
            </div>

        </div>
    </x-container>

</x-app-layout>
