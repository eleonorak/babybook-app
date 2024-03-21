<div class="relative overflow-visible shadow-md sm:rounded-lg bg-white">
    <div
        class="flex items-center justify-between border-b flex-col flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white p-4">
        <div><h2 class="text-lg font-semibold font-">Вакцинација</h2></div>
    </div>
    <div class="p-4">
        @if($children->count() > 0)
            @php
                $active = 1;
            @endphp
            <div class="md:flex tabs">
                <ul class="tabs-nav flex-column space-y space-y-4 text-sm font-medium text-gray-500 md:me-4 md:pe-4 mb-4 md:mb-0 min-w-[140px] text-center">
                    @foreach($children as $i => $item)
                        <li class="tabs-nav-item {{ ($i+1) === $active ? 'active' : 'inactive' }}">
                            <a href="#" class="inline-flex items-center px-4 py-1.5 rounded-lg w-full" aria-current="page">
                                <svg class="w-4 h-4 me-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                </svg>
                                {{ sprintf('%s', $item->name) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tabs-contentoverflow-hidden sm:rounded-lg w-full">
                    @foreach($children as $i => $item)
                        @php
                            $vaccinations = $item->vaccinations();
                            $futureCount  = 0;
                        @endphp
                        <div class="tabs-content-item {{ ($i+1) === $active ? 'active' : 'inactive' }}">
                            <ol class="relative border-s border-gray-200">
                                @foreach($vaccines as $vaccine)
                                    @php
                                        $treatment = $vaccinations->where('vaccine_id', '=', $vaccine->id)->first();
                                        $is_complete = null !== $treatment;
                                        $status = 'Завршена';
                                        $vaccine_date = $treatment ? \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $treatment->vaccinated_at) : $item->birth_date->addHours($vaccine->age);
                                        $badge_color  = 'bg-green-50 text-green-800';
                                        $row_color = 'bg-green-100';
                                        if(!$is_complete) {
                                            if($vaccine->age > $item->getHoursAge()) {
                                                if($futureCount === 0) {
                                                    $status = 'Следува';
                                                    $badge_color  = 'bg-cyan-600 text-white';
                                                     $row_color = 'bg-cyan-200';
                                                } else {
                                                    $status = 'Во иднина';
                                                    $badge_color  = 'bg-gray-300 text-green-800';
                                                    $row_color = 'bg-gray-50';
                                                }
                                                $futureCount++;

                                            } else {
                                                $status = 'Задоцнета';
                                                $badge_color  = 'bg-red-100 text-red-800';
                                                $row_color = 'bg-red-50';
                                            }
                                        }
                                    @endphp
                                    <li class="mb-6 ms-6 {{ $row_color }} p-4 pr-[100px] rounded relative">
                                        <span class="absolute flex items-center justify-center w-6 h-6 {{ $row_color }} rounded-full -start-9 ring-8 ring-white">
                                            <span class="{{ $badge_color }} babybook-medkit p-1 rounded-full"></span>
                                        </span>
                                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">{{ $vaccine->name }}</h3>
                                        <span class="{{ $badge_color }} text-sm font-medium me-2 px-2.5 py-0.5 rounded ms-3 absolute top-6 right-2">{{ $status }}</span>
                                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Препорачано: {{ $vaccine->age_title }} - {{ $vaccine_date->format('d M Y') }}</time>
                                        <p class="mb-4 text-base font-normal text-gray-500">{{ $vaccine->description }}</p>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            @include('home.global.no-data')
        @endif
    </div>
</div>




