@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} 
    {!! $attributes->merge([
        'class' => 'border-gray-300 focus:border-[#1a8dc3] focus:ring-[#1a8dc3] rounded-md shadow-sm'
    ]) !!}>
