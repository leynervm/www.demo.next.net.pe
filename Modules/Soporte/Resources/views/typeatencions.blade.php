<x-app-layout>

    <div class="mt-3 flex flex-wrap gap-2">
        @livewire('soporte::typeatencions.create-typeatencion')
        <x-link-next href="{{ route('atenciones') }}" titulo="Atenciones">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m3 17 2 2 4-4" />
                <path d="m3 7 2 2 4-4" />
                <path d="M13 6h8" />
                <path d="M13 12h8" />
                <path d="M13 18h8" />
            </svg>
        </x-link-next>
    </div>

    <x-title-next titulo="Tipos de atención" class="mt-5" />

    <div class="mt-3">
        @livewire('soporte::typeatencions.show-typeatencions')
    </div>

</x-app-layout>
