@php

if(!$errors->isEmpty())
    dd($errors)
@endphp

<form action="{{route('child.medical-treatments.update',['child'=> $child->id,'medical_treatment'=>$medicalTreatment->id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}


    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            @php

                $typeName = $medicalTreatment->type ? $medicalTreatment->type->name : '';

                @endphp
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Промена на податоци за {{$typeName}}

            </div>

            <div>

                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" value="{{old('date',$medicalTreatment->date)}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум "/>

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>

                <div>

                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{old('notes',$medicalTreatment->notes)}}</textarea>

                </div>

                <div class="flex justify-center my-6">
                    <input type="hidden" id="medicalTreatmentType" name="medical_treatment_type_id" value="{{$medicalTreatment->type ? $medicalTreatment->type->id : ''}}">
                    <button type="submit"  name="submit" value="1"  class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                        Внеси
                    </button>
                </div>
                <div class="flex justify-center my-6">
                    <a href="{{route('child.medical-treatments.index', ['child'=>$child->id ])}}" class="text-center rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
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



