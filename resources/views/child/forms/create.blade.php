<form action="{{route('child.store')}}"  method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}

    <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[150px]">
                Внесете податоци за вашето бебе
            </div>
            <div class="">
                <div>
                    <label for="name"  class="mb-3 block text-base font-medium text-[#07074D]">
                        Внесете име
                    </label>
                    <input type="text" name="name" id="name" value="{{old('name')}}" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Име "/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    @endif
                </div>
                <div>
                    <label for="gender" class="mb-3 mt-6 block text-base font-medium text-[#07074D]">
                        Изберете пол
                    </label>

                    <input {{ old('gender') === 'M' ? 'checked' : '' }} type="radio" id="gender1" name="gender" value="M" class="focus:outline-none  border-b pb-2 border-sky-400 placeholder-gray-500 my-3">
                    Машко
                    <input {{ old('gender') === 'F' ? 'checked' : '' }} type="radio" id="gender2" name="gender" value="F" class="focus:outline-none border-b pb-2 border-sky-400 placeholder-gray-500 my-3" >
                    Женско

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('gender')" class="mb-8" />
                    @endif
                </div>
                <div>
                    <label for="birth_date" class="mb-3 block text-base font-medium text-[#07074D]">
                        Изберете датум на раѓање
                    </label>
                    <input type="date" id="birth_date" name="birth_date" class=" datepicker-element focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-2" value="{{ old('birth_date') ? old('birth_date') : \Carbon\Carbon::now()->format('Y-m-d') }}>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                    @endif

                </div>
                <div>
                    <label for="childPhoto" class="mb-3 mt-5 block text-base font-medium text-[#07074D]">
                        Изберете слика
                    </label>
                    <input type="file" id="childPhoto" name="childPhoto"  class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8">
                </div>

                <div class="flex justify-center my-6">
                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.index')}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Откажи
                    </a>
                </div>
            </div>
        </div>
    </div>
</form>
