@props(['size' => 'normal'])

@php
    if('small' === $size) {
        $sizeClass = 'text-sm px-5 py-1 me-2';
    } else if('large' === $size){
        $sizeClass = 'text-xl px-8 py-4 me-2';
    } else {
        $sizeClass = 'text-sm px-5 py-2.5 me-2';
    }
        // text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-center
    // text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-center


@endphp

<a {{ $attributes->merge(['class' => 'text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 font-medium rounded-lg text-center '.$sizeClass]) }}>{{ $slot }}</a>
