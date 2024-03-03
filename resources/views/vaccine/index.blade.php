<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Вакнцинација') }}
        </h2>
    </x-slot>

    <x-container>
        <div class="relative overflow-x-auto shadow sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Име
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Возраст
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Намена
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Опис
                    </th>
                </tr>
                </thead>
                <tbody>
                @if($items->count() > 0)
                    @foreach($items as $i => $item)
                        <tr class="bg-white {{ $items->count()-1 == $i ? '' : 'border-b' }}">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->age_title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->comment }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->description }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <td>Не се пронајдени резултати.</td>
                @endif
                </tbody>
            </table>
        </div>
        @if($items->hasPages())
            <div class="mt-4">
                {!! $items->links() !!}
            </div>
        @endif
    </x-container>

</x-app-layout>
