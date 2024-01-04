<div class="gallery-month">
    <div class="mb-4 p-4 text-sm">
        <div x-data="previewImage('{{ $item ? $item->url : '' }}')">
            <label for="month{{$key}}">
                <div class="w-full h-48 rounded bg-gray-100 border border-gray-200 flex items-center justify-center overflow-hidden">
                    <img x-show="imageUrl" :src="imageUrl" class="w-full object-cover">
                    <div x-show="!imageUrl" class="text-gray-300 flex flex-col items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <div>Прикачи слика за месец #{{ $key }}</div>
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
