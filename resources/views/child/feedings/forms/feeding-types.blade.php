

    <form action="{{route('child.feedings.create',['child'=>$child->id])}}" method="GET">

        <div
            class=" pt-10 flex items-center justify-center">
            <div class="bg-white overflow-hidden shadow sm:rounded-lg w-full py-6 px-10 sm:max-w-md">
                <div class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12 mt-[30px]">
                    Изберете начин на хранење
                </div>

                <div class="flex justify-center my-6">
                    @foreach($feedingsTypes as $item)
                        <button type="submit" name="feedingType" value="{{$item->id}}"
                                class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold ">
                            {{$item->name}}
                        </button>

                    @endforeach
                </div>
            </div>
        </div>
    </form>



