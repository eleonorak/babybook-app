<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    @include('home.widgets.activity.global.header', $activity)
    <table class="border-t w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase  bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50 border-b">
        <tr>
            <th scope="col" class="px-6 py-3">
                Дете
            </th>
            <th scope="col" class="px-6 py-3">
                Тип
            </th>
            <th scope="col" class="px-6 py-3">
                Време
            </th>
            <th scope="col" class="px-6 py-3">
                Забелешки
            </th>
        </tr>
        </thead>
        <tbody>
        @if($total > 0)
            @foreach($records as $i => $record)
                <tr class="bg-white {{ $total-1 === $i ? 'border-b' : '' }}">
                    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">
                        <img class="w-10 h-10 rounded-full" src="{{ $record->child->profile_photo }}" alt="Jese image">
                        <div class="ps-3">
                            <div class="text-base font-semibold">{{ $record->child->name }}</div>
                            <div class="font-normal text-gray-500">{{ $record->child->birthdate }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{ !empty($record->type) ? $record->type->name : '' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ \App\Helpers\Date::format( $record->date ) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ !empty($record->notes) ? $record->notes : 'Нема' }}
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="bg-white">
                <td class="px-6 py-4" colspan="4">
                    @include('home.global.no-data')
                </td>
            </tr>
        @endif
        </tbody>
    </table>
    @include('home.widgets.activity.global.footer', $activity)
</div>
