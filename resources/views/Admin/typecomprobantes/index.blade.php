<x-app-layout>

    <x-slot name="breadcrumb">
        @if (Module::isEnabled('Ventas'))
            <x-link-breadcrumb text="VENTAS" route="admin.ventas">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M11.5 21h-2.926a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304h11.339a2 2 0 0 1 1.977 2.304l-.117 .761" />
                        <path d="M9 11v-5a3 3 0 0 1 6 0v5" />
                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                        <path d="M20.2 20.2l1.8 1.8" />
                    </svg>
                </x-slot>
            </x-link-breadcrumb>
        @endif

        <x-link-breadcrumb text="TIPO COMPROBANTES" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M12 2H12.7727C16.0339 2 17.6645 2 18.7969 2.79784C19.1214 3.02643 19.4094 3.29752 19.6523 3.60289C20.5 4.66867 20.5 6.20336 20.5 9.27273V11.8182C20.5 14.7814 20.5 16.2629 20.0311 17.4462C19.2772 19.3486 17.6829 20.8491 15.6616 21.5586C14.4044 22 12.8302 22 9.68182 22C7.88275 22 6.98322 22 6.26478 21.7478C5.10979 21.3424 4.19875 20.4849 3.76796 19.3979C3.5 18.7217 3.5 17.8751 3.5 16.1818V11.5" />
                    <path
                        d="M20.5 12C20.5 13.8409 19.0076 15.3333 17.1667 15.3333C16.5009 15.3333 15.716 15.2167 15.0686 15.3901C14.4935 15.5442 14.0442 15.9935 13.8901 16.5686C13.7167 17.216 13.8333 18.0009 13.8333 18.6667C13.8333 20.5076 12.3409 22 10.5 22" />
                    <path
                        d="M7.70569 9.44141C8.45931 10.1862 9.68117 10.1862 10.4348 9.44141C11.1884 8.69662 11.1884 7.48908 10.4348 6.74429L8.7291 5.05859C8.06295 4.40025 7.03095 4.32384 6.27987 4.82935M6.29431 2.55859C5.54069 1.8138 4.31883 1.8138 3.56521 2.55859C2.8116 3.30338 2.8116 4.51092 3.56521 5.25571L5.2709 6.94141C5.94932 7.61187 7.00718 7.67878 7.76133 7.14213" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    {{-- <div class="flex flex-wrap gap-2 mt-3">
        <livewire:admin.typecomprobantes.create-typecomprobante />
    </div> --}}

    {{-- <x-title-next titulo="Tipos de comprobantes" class="mt-5" /> --}}

    <div class="mt-3">
        <livewire:admin.typecomprobantes.show-typecomprobantes />
    </div>

</x-app-layout>
