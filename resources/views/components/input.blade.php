@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'px-3 border-gray-300 dark:border-neutral-800 bg-white dark:bg-neutral-900 dark:placeholder-neutral-400 focus:border-blue-500 focus:ring-blue-500 rounded-lg']) !!}>
