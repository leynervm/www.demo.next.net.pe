<x-app-layout>
    <x-slot name="breadcrumb">
        <x-link-breadcrumb text="CLIENTES" route="admin.clientes">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 19a6 6 0 0 0-12 0" />
                    <circle cx="8" cy="9" r="4" />
                    <path d="M22 19a6 6 0 0 0-6-6 4 4 0 1 0 0-8" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>

        <x-link-breadcrumb text="INFORMACIÓN CLIENTE" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 19a6 6 0 0 0-12 0" />
                    <circle cx="8" cy="9" r="4" />
                    <path d="M22 19a6 6 0 0 0-6-6 4 4 0 1 0 0-8" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="mx-auto lg:max-w-4xl xl:max-w-7xl animate__animated animate__fadeIn animate__faster">
        <livewire:admin.clients.view-client :client="$client" />
    </div>

</x-app-layout>
