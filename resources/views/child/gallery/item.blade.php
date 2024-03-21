<div class="gallery-month">
    <div class="mb-4 p-4 text-sm">
        <div x-data="previewImage('{{ $item ? $item->url : '' }}')">
            <div x-show="imageUrl" class="w-full cursor-pointer relative h-48 rounded bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden bg-cover bg-no-repeat" :style="`background-image: url(${imageUrl})`">
                <div class="absolute bottom-0 left-0 w-full flex justify-between bg-black/[.54] p-1">
                    <div class="w-[100px] text-center bg-[#f0f0f0] rounded-md">Месец #{{ $key + 1 }}</div>
                    <div class="mr-2">
                        <label for="month{{ $key }}" class="bg-[#f0f0f0] rounded p-0.5 mr-2">
                            <span class="babybook-edit"></span>
                        </label>
                        <a href="{{ $item ? $item->url : '' }}" target="_blank" class="bg-[#f0f0f0] rounded p-0.5">
                            <span class="babybook-plus"></span>
                        </a>
                    </div>
                </div>
            </div>
            <label x-show="!imageUrl" for="month{{$key}}">
                <div class="w-full h-48 rounded bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden">
                    <div class="text-gray-500 flex flex-col items-center relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <div>Прикачи слика за месец #{{ $key + 1 }}</div>
                    </div>
                </div>
            </label>
            <div class="invisible -mt-20">
                <label for="month{{$key}}" class="block mb-2 mt-4 font-bold">Upload image..</label>
                <input class="w-full cursor-pointer" type="file" name="month{{$key}}" id="month{{$key}}" @change="fileChosen">
            </div>
        </div>
    </div>
</div>
