<button
    {{ $attributes->merge(['class' => 'inline-block p-0.5 rounded-sm disabled:opacity-75 transition ease-in-out duration-150', 'type' => 'button']) }}>
    <svg class="w-5 h-5 scale-125" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path fill="currentColor"
            d="M11 12C11 13.6569 9.65685 15 8 15C6.34315 15 5 13.6569 5 12C5 10.3431 6.34315 9 8 9C9.65685 9 11 10.3431 11 12Z" />
        <path
            d="M16 6H8C4.68629 6 2 8.68629 2 12C2 15.3137 4.68629 18 8 18H16C19.3137 18 22 15.3137 22 12C22 8.68629 19.3137 6 16 6Z" />
    </svg>
</button>
