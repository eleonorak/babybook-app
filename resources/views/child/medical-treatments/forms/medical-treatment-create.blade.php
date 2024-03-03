<form action="{{route('child.medical-treatments.store',['child'=>$child->id])}}" method="POST">
    {{ csrf_field() }}

    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Внес на податоци за медицински третман {{$medicalTreatmentType->name}}
            </div>
            <div>
                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " value="{{ old('date') ? old('date') : \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}"/>
                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>
                @if(!empty($vaccines))
                    <div>
                        <label for="vaccines" class="my-6 block text-base font-medium text-[#07074D]">Вакцини</label>
                        <select name="vaccines[]" id="vaccines" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full" multiple>
                            <option>Избери</option>
                            @foreach($vaccines as $vaccine)
                                <option value="{{ $vaccine->id }}">{{ $vaccine->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                <div>
                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>
                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{old('notes')}}</textarea>
                </div>
                <div class="flex justify-center my-6">
                    <input type="hidden" id="medicalTreatmentType" name="medical_treatment_type_id" value="{{$medicalTreatmentType->id}}">
                    <x-btn-primary size="large" type="submit"  name="submit" value="1">
                        <span class="babybook-floppy"></span> Внеси
                    </x-btn-primary>
                </div>
                <div class="flex justify-center my-6">
                    <x-btn-link href="{{route('child.medical-treatments.index',['child'=>$child->id])}}">
                        <span class="babybook-angle-left"></span> Откажи
                    </x-btn-link>
                </div>
            </div>
        </div>
    </div>
</form>



