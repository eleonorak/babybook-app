

    <form action="{{route('child.medical-treatments.create',['child'=>$child->id])}}" method="GET">

        <div
            class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center">
            <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
                <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[150px]">
                    Изберете тип на мерење
                </div>

                <div class="flex justify-center my-6">
                    @foreach($medicalTreatmentTypes as $item)
                        <button type="submit" name="medicalTreatmentType" value="{{$item->id}}"
                                class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold ">
                            {{$item->name}}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </form>



