@props(['size' => 'normal'])

@php
    if('small' === $size) {
        $sizeClass = 'text-sm px-5 py-1 me-2';
    } else if('large' === $size){
        $sizeClass = 'text-xl px-8 py-4 me-2';
    } else {
        $sizeClass = 'text-sm px-5 py-2.5 me-2';
    }
@endphp

<button {{ $attributes->merge(['class' => 'text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm text-center '.$sizeClass]) }}>
    {{ $slot }}
</button>
