<form action="{{route('child.update', ['child'=>$child->id])}}"  method="POST" enctype="multipart/form-data" >
    {{ csrf_field() }}
    {{ method_field('PATCH') }}


    <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[150px]">
                Промена на податоци за вашето бебе
            </div>
            <div class="">
                <div>
                    <label for="name" class="mb-3 block text-base font-medium text-[#07074D]">
                        Внесете име
                    </label>
                    <input type="text" name="name" id="name" value="{{$child->name}}" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Име "/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    @endif
                </div>
                <div>
                    <label for="gendre" class="mb-3 mt-6 block text-base font-medium text-[#07074D]">
                        Изберете пол
                    </label>

                    @if($child->gendre == 'M')
                        <input checked type="radio"  id="gender1" name="gender" value="M" class="focus:outline-none  border-b pb-2 border-sky-400 placeholder-gray-500 my-3">
                        Машко
                        <input  type="radio" id="gender2" name="gender" value="F" class="focus:outline-none border-b pb-2 border-sky-400 placeholder-gray-500 my-3" >
                        Женско
                    @else
                        <input  type="radio"  id="gender1" name="gender" value="M" class="focus:outline-none  border-b pb-2 border-sky-400 placeholder-gray-500 my-3">
                        Машко
                        <input checked type="radio" id="gender2" name="gender" value="F" class="focus:outline-none border-b pb-2 border-sky-400 placeholder-gray-500 my-3" >
                    Женско
                    @endif

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('gender')" class="mb-8" />
                    @endif
                </div>
                <div>
                    <label for="birthday" class="mb-3 block text-base font-medium text-[#07074D]">
                        Изберете датум на раѓање
                    </label>
                    <input type="date" id="birth_date" value="{{$child->birth_date->format('Y-m-d')}}" name="birth_date" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-2">


                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
                    @endif

                </div>
                <div>
                    <label for="" class="mb-3 mt-5 block text-base font-medium text-[#07074D]">
                        Моментална слика
                    </label>


                    <img src="{{ $child->profile_photo }}" class="w-32 group-hover:w-36 group-hover:h-36 h-32 object-center object-cover rounded-full transition-all duration-500 delay-500 transform"/>


                    <label for="childPhoto" class="mb-3 mt-5 block text-base font-medium text-[#07074D]">
                        Изберете слика
                    </label>
                    <input type="file" id="childPhoto" name="childPhoto" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8">
                </div>

                <div class="flex justify-center my-6">
                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.index')}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold" >
                        Откажи
                    </a>
                </div>
                @if (session('status') === 'record-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-xl text-cyan-400 text-center"
                    >{{ __('Промените се зачувани.') }}</p>
                @endif
            </div>
        </div>
    </div>
</form>