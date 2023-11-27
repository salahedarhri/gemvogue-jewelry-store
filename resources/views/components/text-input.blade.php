@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-mediumShade focus:ring-mediumShade rounded-md shadow-sm']) !!}>
