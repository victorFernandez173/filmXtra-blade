@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-[2px] border-gray-300 focus:ring-flamingo focus:ring-flamingo rounded-md shadow-sm focus:border-[2px] focus:border-flamingo']) !!}>
