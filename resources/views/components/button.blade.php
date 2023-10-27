<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center px-4 py-2 bg-black border border-transparent rounded-lg font-semibold text-xs text-white hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
