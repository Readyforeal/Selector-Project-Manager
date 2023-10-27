@if ($color == 'green')
<span {!! $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2 py-1 text-xs bg-green-50 text-green-700 ring-green-600/20 dark:bg-green-600/10 dark:text-green-500 dark:ring-green-500/20 font-medium ring-1 ring-inset']) !!}>
    {{ $slot }}
</span>
@endif

@if ($color == 'gray')
<span {!! $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2 py-1 text-xs bg-gray-50 text-gray-700 ring-gray-600/20 dark:bg-gray-600/10 dark:text-gray-500 dark:ring-gray-500/20 font-medium ring-1 ring-inset']) !!}>
    {{ $slot }}
</span>
@endif

@if ($color == 'blue')
<span {!! $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2 py-1 text-xs bg-blue-50 text-blue-700 ring-blue-600/20 dark:bg-blue-600/10 dark:text-blue-500 dark:ring-blue-500/20 font-medium ring-1 ring-inset']) !!}>
    {{ $slot }}
</span>
@endif

@if ($color == 'red')
<span {!! $attributes->merge(['class' => 'inline-flex items-center rounded-md px-2 py-1 text-xs bg-red-50 text-red-700 ring-red-600/20 dark:bg-red-600/10 dark:text-red-500 dark:ring-red-500/20 font-medium ring-1 ring-inset']) !!}>
    {{ $slot }}
</span>
@endif