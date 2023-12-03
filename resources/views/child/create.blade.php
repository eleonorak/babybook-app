<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мое бебе') }}
        </h2>
    </x-slot>
    <form>

        <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
            <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
                <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
                    Внесете податоци за вашето бебе
                </div>
                <div class="">
                    <div>
                        <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                            Внесете име
                        </label>
                        <input type="text" name="name" id="name" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Име "/>
                    </div>
                    <div>
                        <label for="gendre" class="mb-3 block text-base font-medium text-[#07074D]">
                            Изберете пол
                        </label>

                        <input type="radio" id="gendre1" name="gendre" value="1" class="focus:outline-none  border-b pb-2 border-sky-400 placeholder-gray-500 my-8">
                            Машко
                        <input type="radio" id="gendre2" name="gendre" value="1" class="focus:outline-none border-b pb-2 border-sky-400 placeholder-gray-500 my-8" >
                        Женско
                    </div>
                    <div>
                        <label for="birthday" class="mb-3 block text-base font-medium text-[#07074D]">
                            Изберете датум на раѓање
                        </label>
                        <input type="date" id="birthday" name="birthday" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8">

                    </div>
                    <div>
                        <label for="childPhoto" class="mb-3 block text-base font-medium text-[#07074D]">
                            Изберете слика
                        </label>
                        <input type="file" id="childPhoto" name="childPhoto" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8">
                    </div>

                    <div class="flex justify-center my-6">
                        <button class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                           Внеси
                        </button>
                    </div>
                    <div class="flex justify-center my-6">
                        <a href="" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                            Откажи
                        </a>
                    </div>
                </div>
            </div>
        </div
    </form>


</x-app-layout>
