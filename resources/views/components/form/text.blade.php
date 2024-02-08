@props(['disabled' => false])
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'relative block w-full border-transparent shadow shadow-primary-200 focus:shadow-md focus:shadow-primary-200 rounded-lg px-12 py-12 font-sans text-sm  placeholder:font-sans placeholder:text-sm placeholder:text-primary-500 focus:border-transparent focus:ring-0']) !!}>