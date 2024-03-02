<form action="{{route('child.measurements.store',['child'=>$child->id])}}" method="POST">
    {{ csrf_field() }}

    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            @php
                $typeName = $measurementType->name;
                @endphp
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Внес на податоци за мерење на {{$typeName}}

            </div>

            <div>
                    <div>
                        <label for="value" class="mb-3 block text-base font-medium text-[#07074D]">
                            Измерена вредност
                        </label>
                        <input  width="48" height="48"  type="text" name="value" id="value" value="{{old('value')}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500"  placeholder="Вредност во {{ $unit->name }}"/>

                        @if(!empty($errors))
                            <x-input-error :messages="$errors->get('value')" class="mt-2" />
                        @endif
                    </div>

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

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{old('notes')}}</textarea>

                </div>

                <div class="flex justify-center my-6">
                    <input type="hidden" id="measurementType" name="measurement_type_id" value="{{$measurementType->id}}">
                    <input type="hidden" id="unit_id" name="unit_id" value="{{$unit->id}}">
                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.measurements.index',['child'=>$child->id])}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Откажи
                    </a>
                </div>


            </div>


        </div>
    </div>
</form>



