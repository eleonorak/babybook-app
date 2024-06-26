
<form action="{{route('child.baths.update',['child'=>$child->id,'bath'=>$bath->id])}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg w-full py-6 px-10 sm:max-w-md">

            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Промена на податоци за капење
            </div>

            <div>
                <div>
                    <label for="date" class="my-6 block text-base font-medium text-[#07074D]">
                        Изберете датум
                    </label>
                    <input type="text" name="date" id="date" value="{{old('date', $bath->date)}}" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full datetimepicker-element"  placeholder="Датум " />

                    @if(!empty($errors))
                        <x-input-error :messages="$errors->get('date')" class="mt-2" />
                    @endif
                </div>

                <div>
                    <label for="notes" class="my-6 block text-base font-medium text-[#07074D]">Внесете забелешка</label>

                    <textarea id="notes" name="notes" rows="4" cols="50" class="focus:outline-none border-b  pb-2 border-sky-400 placeholder-gray-500 w-full"  placeholder="Забелешка">{{ old('date', $bath->notes)}}</textarea>
                </div>

                <div class="flex justify-center my-6">
                    <x-btn-primary size="large" type="submit"  name="submit" value="1">
                        <span class="babybook-floppy"></span> Зачувај
                    </x-btn-primary>
                </div>
                <div class="flex justify-center my-6">
                    <x-btn-link href="{{route('child.baths.index',['child'=>$child->id])}}">
                        <span class="babybook-angle-left"></span> Откажи
                    </x-btn-link>
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



