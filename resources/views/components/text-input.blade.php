@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:text-black focus:border-orange-400 focus:ring-orange-400 rounded-md shadow-sm']) !!}>
