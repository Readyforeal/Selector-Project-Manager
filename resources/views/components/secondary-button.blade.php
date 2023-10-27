<button {{ $attributes->merge(['type' => 'button', 'class' => 'items-center px-4 py-2 bg-gray-50 border border-gray-600/20 rounded-lg font-semibold text-xs text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
