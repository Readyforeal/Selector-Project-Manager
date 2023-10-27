@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-neutral-800 bg-transparent focus:border-blue-500 focus:ring-blue-500 rounded-xl']) !!}></textarea>
