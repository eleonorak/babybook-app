

<form action="{{route('child.feedings.update',['child'=>$child->id,'feeding'=>$feeding->id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}


    <div
        class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center">
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            @php
                //$t = $feedingsTypes->find($feedingType)->name;
                $typeName = $feeding->type ? $feeding->type->name : '';

                @endphp
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[150px]">
                Промена на податоци за хранењe од тип {{$typeName}}

            </div>

            <div>
                @php
                    $isMeasurable = $feeding->type ? $feeding->type->measurable : false;

                @endphp
                @if($isMeasurable == 1 )

                    <div>
                        <label for="quantity" class="mb-3 block text-base font-medium text-[#07074D]">
                            Внесете количина
                        </label>
                        <input  width="48" height="48"  type="text" name="quantity" id="quantity" value="{{$feeding->quantity}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500"  placeholder="Количина во {{ $user->volumeUnit->name }}"/>

                        @if(!empty($errors))
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        @endif
                    </div>

                @endif


                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " value="{{ $feeding->date }}"/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>

                <div>

                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{$feeding->notes}}</textarea>

                </div>

                <div class="flex justify-center my-6">
                    <input type="hidden" id="feedingType" name="feeding_type_id" value="{{$feeding->type ? $feeding->type->id : ''}}">
                    <input type="hidden" id="" name="measurable" value="{{ $feeding->type ? (int) $feeding->type->measurable : 0}}">

                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.feedings.index', ['child'=>$child->id ])}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
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
    </div>
</form>



