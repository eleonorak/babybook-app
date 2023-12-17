<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Мое бебе') }}
        </h2>

        <div class="sm:col-span-4 float-right">
            <a href="{{ route('child.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" > + Додади бебе</a>
        </div>
    </x-slot>

    <section class="text-gray-700 body-font">
        <div class="container px-5 py-2 mx-auto">

            <div class="flex flex-wrap -m-4 text-center justify-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('babybottle.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                        <h2 class="title-font font-medium text-3xl text-gray-900">Хранење</h2>
                        <a  href="{{route('child.feedings.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Повеќе</a>

                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('babydiaper.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">
                        <h2 class="title-font font-medium text-3xl text-gray-900">Пелени</h2>
                        <a href="{{route('child.diaper-changes.index',['child'=>$child->id])}}" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</a>

                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('babybath.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                        <h2 class="title-font font-medium text-3xl text-gray-900">Капење</h2>
                        <button type="button" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</button>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="text-gray-700 body-font">
        <div class="container px-5 py-2 mx-auto">

            <div class="flex flex-wrap -m-4 text-center justify-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('sleepingbaby.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                        <h2 class="title-font font-medium text-3xl text-gray-900">Спиење</h2>
                        <button type="button" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</button>

                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('measurement.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                        <h2 class="title-font font-medium text-3xl text-gray-900">Мерења</h2>
                        <button type="button" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</button>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('hospitalsymbol.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                        <h2 class="title-font font-medium text-3xl text-gray-900">Здравје</h2>
                        <button type="button" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</button>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font">
        <div class="container px-5 py-2 mx-auto">

            <div class="flex flex-wrap -m-4 text-center justify-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg transform transition duration-500 hover:scale-110">
                        <img  src="{{ Vite::image('photogalery.svg') }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block">

                        <h2 class="title-font font-medium text-3xl text-gray-900">Галерија</h2>
                        <button type="button" class="leading-relaxed text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Детали</button>
                    </div>
                </div>

            </div>
        </div>
    </section>



</x-app-layout>
