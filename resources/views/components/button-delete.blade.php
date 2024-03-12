<button
    {{ $attributes->merge(['class' => 'inline-block group font-semibold text-sm bg-transparent text-red-500 p-1 rounded-md hover:bg-red-500 focus:bg-red-500 hover:ring-2 hover:ring-red-300 focus:ring-2 focus:ring-red-300 hover:text-white focus:text-white disabled:opacity-25 transition ease-in duration-150', 'type' => 'button']) }}>
    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mx-auto" viewBox="0 0 24 24" fill="none" stroke="currentColor"
        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M3 6h18" />
        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
        <line x1="10" x2="10" y1="11" y2="17" />
        <line x1="14" x2="14" y1="11" y2="17" />
    </svg>
</button>