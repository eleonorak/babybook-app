

<form action="{{route('child.feedings.update',['child'=>$child->id,'feeding'=>$feeding->id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}


    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            @php
                //$t = $feedingsTypes->find($feedingType)->name;
                $typeName = $feeding->type ? $feeding->type->name : '';

                @endphp
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
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
                        <input  width="48" height="48"  type="text" name="quantity" id="quantity" value="{{old('quantity',$feeding->quantity)}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500"  placeholder="Количина во {{ $user->volumeUnit->name }}"/>

                        @if(!empty($errors))
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        @endif
                    </div>

                @endif


                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" value="{{old('date',$feeding->date)}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум "/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>

                <div>

                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{old('notes',$feeding->notes)}}</textarea>

                </div>

                <div class="flex justify-center my-6">
                    <input type="hidden" id="feedingType" name="feeding_type_id" value="{{$feeding->type ? $feeding->type->id : ''}}">
                    <input type="hidden" id="" name="measurable" value="{{ $feeding->type ? (int) $feeding->type->measurable : 0}}">

                    <x-btn-primary size="large" type="submit"  name="submit" value="1">
                        <span class="babybook-floppy"></span> Зачувај
                    </x-btn-primary>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.feedings.index', ['child'=>$child->id ])}}">
                        <span class="babybook-angle-left"></span> Откажи
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



