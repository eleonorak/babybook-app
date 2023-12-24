
<form action="{{route("child.sleep-periods.store",['child'=> $child->id])}}" method="POST">
    {{ csrf_field() }}

    <div
        class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center">
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">

            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[150px]">
                Внесете податоци за спиење
            </div>

            <div>

                <div>
                    <label for="start" class="my-6 block text-base font-medium text-[#07074D]">
                        Од
                    </label>
                    <input type="text" name="start" id="start" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " value="{{ old('date') ? old('date') : \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('start')" class="mt-2" />
                    @endif
                </div>

                <div>
                    <label for="end" class="my-6 block text-base font-medium text-[#07074D]">
                        До
                    </label>
                    <input type="text" name="end" id="end" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " value="{{ old('date') ? old('date') : \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('end')" class="mt-2" />
                    @endif
                </div>

                <div>
                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка"></textarea>
                </div>

                <div class="flex justify-center my-6">
                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.sleep-periods.index',['child'=>$child->id])}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Откажи
                    </a>
                </div>


            </div>


        </div>
    </div>
</form>



