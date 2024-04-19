@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1 border-b-2 border-amber-700 text-base font-medium leading-5 text-black focus:outline-none focus:border-amber-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-base font-medium leading-5 text-black hover:text-black hover:border-fourth focus:outline-none focus:text-amber-700 focus:border-amber-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
