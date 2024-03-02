<x-app-layout>
    <x-slot name="header">
        @include('child.global.header', ['child' => $child])
    </x-slot>

    <x-container>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('babybottle.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Хранење</h2>
                    <a  href="{{route('child.feedings.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Повеќе</a>

                </div>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('babydiaper.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Пелени</h2>
                    <a href="{{route('child.diaper-changes.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>

                </div>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('babybath.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Капење</h2>
                    <a href="{{route('child.baths.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>

                </div>
            </div>

        </div>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('sleepingbaby.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Спиење</h2>
                    <a href="{{route('child.sleep-periods.index',['child'=> $child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>

                </div>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('measurement.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Мерења</h2>
                    <a href="{{route('child.measurements.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>
                </div>
            </div>
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('hospitalsymbol.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Здравје</h2>
                    <a href="{{route('child.medical-treatments.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>
                </div>
            </div>

        </div>
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 sm:w-1/3 w-full">
                <div class="border-2 bg-white border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                    <img  src="{{ Vite::image('photogalery.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                    <h2 class="title-font font-medium text-3xl text-gray-900 mb-3">Галерија</h2>
                    <a href="{{route('child.gallery.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>
                </div>
            </div>

        </div>
    </x-container>

</x-app-layout>
