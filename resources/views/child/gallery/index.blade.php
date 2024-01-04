@php
    /* @var array $items */
@endphp


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Мое бебе') }}
        </h2>
        <div class="sm:col-span-4 float-right px-2 ">
            <a href="{{ route('child.index') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Назад</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $current = 0;
                    @endphp
                    @foreach($items as $i => $row)
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($row as $j => $month)
                                @include('child.gallery.item', ['key' => $current, 'item' => $month])
                                @php
                                    $current++;
                                @endphp
                            @endforeach
                        </div>
                    @endforeach
                    <script>
                        function previewImage(url) {
                            return {
                                imageUrl: url ? url : null,
                                imageFile: null,
                                fileChosen: function (event) {
                                    this.fileToDataUrl(event, (src) => {
                                        this.imageUrl = src.url;
                                        this.imageFile = src.file;
                                        let name = event.target.getAttribute('name');

                                        let data = new FormData();
                                        data.append('photo', src.file, src.file.name)
                                        data.append('type', name);
                                        let settings = {
                                            headers: {
                                                'Content-Type': 'multipart/form-data',
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            }
                                        }

                                        axios.post('{{ route('child.gallery.upload', ['child' => $child->id]) }}', data, settings)
                                            .then(response => {
                                                console.log('Complete:');
                                                console.log(response)
                                            }).catch(response => {
                                            console.log(response)
                                        })

                                    });
                                    console.log(axios);
                                },
                                fileToDataUrl: (event, callback) => {
                                    if (event.target.files.length > 0) {
                                        let file = event.target.files[0],
                                            reader = new FileReader();

                                        reader.readAsDataURL(file);
                                        reader.onload = (e) => callback({
                                            url: e.target.result,
                                            file: file,
                                        });
                                    }
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
