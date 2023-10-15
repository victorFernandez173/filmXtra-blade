<button {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center px-4 py-2 bg-flamingo border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-gray-900 focus:bg-gray-900 active:bg-flamingo focus:outline-none focus:ring-2 focus:ring-flamingo focus:ring-offset-2 focus:text-flamingo transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
