@php
    /* @var array $items */
@endphp


<x-app-layout>

    <x-slot name="header">
        <x-nav-avatar photo="{{ $child->profile_photo }}" name="{{ $child->name }}"/>
        <div class="flex inline-flex items-center gap-4 float-right">
            <x-btn-link href="{{ route('child.index', ['child' => $child]) }}"><span class="babybook-angle-left"></span> Назад</x-btn-link>
        </div>
    </x-slot>

    <x-container>
        <div class="bg-white overflow-hidden shadow sm:rounded-lg">
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
    </x-container>


</x-app-layout>
