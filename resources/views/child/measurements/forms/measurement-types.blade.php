<form action="{{route('child.measurements.create',['child'=>$child->id])}}" method="GET">

    <div
        class=" pt-10 flex items-center justify-center">
        <div class="bg-white overflow-hidden shadow sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
            <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                Изберете тип на мерење
            </div>

            <div class="flex flex-col justify-center">
                @foreach($measurementTypes as $item)
                    <x-btn-primary type="submit" name="measurementType" value="{{$item->id}}" class="mb-4">
                        {{$item->name}}
                    </x-btn-primary>
                @endforeach
            </div>
        </div>
    </div>
</form>



