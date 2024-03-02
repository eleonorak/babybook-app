<form action="{{route('child.feedings.store',['child'=>$child->id])}}" method="POST">
    {{ csrf_field() }}

    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            @php
                $typeName = $feedingType->name;
                @endphp
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Внес на податоци за хранењe од тип {{$typeName}}

            </div>

            <div>
                @php
                    $isMeasurable = $feedingType->measurable;

                @endphp
                @if($isMeasurable == 1 )

                    <div>
                        <label for="quantity" class="mb-3 block text-base font-medium text-[#07074D]">
                            Внесете количина
                        </label>
                        <input  width="48" height="48"  type="text" name="quantity" id="quantity" value="{{old('quantity')}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500"  placeholder="Количина во {{ $user->volumeUnit->name }}"/>

                        @if(!empty($errors))
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
                        @endif
                    </div>

                @endif


                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " value="{{ old('date') ? old('date') : \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>

                <div>

                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes"  rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{old('quantity')}}</textarea>

                </div>

                <div class="flex justify-center my-6">
                    <input type="hidden" id="feedingType" name="feeding_type_id" value="{{$feedingType->id}}">
                    <input type="hidden" id="" name="measurable" value="{{(int) $feedingType->measurable}}">
                    <x-btn-primary size="large" type="submit"  name="submit" value="1">
                        <span class="babybook-floppy"></span> Внеси
                    </x-btn-primary>
                </div>
                <div class="flex justify-center my-6">
                    <x-btn-link href="{{route('child.feedings.index',['child'=>$child->id])}}">
                        <span class="babybook-angle-left"></span> Откажи
                    </x-btn-link>
                </div>


            </div>


        </div>
    </div>
</form>



