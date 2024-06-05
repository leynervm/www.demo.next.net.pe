<x-admin-layout>
    <x-slot name="breadcrumb">
        @can('admin.almacen')
            <x-link-breadcrumb text="ALMACÉN" route="admin.almacen">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M11 22C10.1818 22 9.40019 21.6698 7.83693 21.0095C3.94564 19.3657 2 18.5438 2 17.1613C2 16.7742 2 10.0645 2 7M11 22L11 11.3548M11 22C11.3404 22 11.6463 21.9428 12 21.8285M20 7V11.5" />
                        <path stroke="none" fill="currentColor"
                            d="M21.4697 22.5303C21.7626 22.8232 22.2374 22.8232 22.5303 22.5303C22.8232 22.2374 22.8232 21.7626 22.5303 21.4697L21.4697 22.5303ZM19.8697 20.9303L21.4697 22.5303L22.5303 21.4697L20.9303 19.8697L19.8697 20.9303ZM21.95 17.6C21.95 15.1976 20.0024 13.25 17.6 13.25V14.75C19.174 14.75 20.45 16.026 20.45 17.6H21.95ZM17.6 13.25C15.1976 13.25 13.25 15.1976 13.25 17.6H14.75C14.75 16.026 16.026 14.75 17.6 14.75V13.25ZM13.25 17.6C13.25 20.0024 15.1976 21.95 17.6 21.95V20.45C16.026 20.45 14.75 19.174 14.75 17.6H13.25ZM17.6 21.95C20.0024 21.95 21.95 20.0024 21.95 17.6H20.45C20.45 19.174 19.174 20.45 17.6 20.45V21.95Z" />
                        <path
                            d="M7.32592 9.69138L4.40472 8.27785C2.80157 7.5021 2 7.11423 2 6.5C2 5.88577 2.80157 5.4979 4.40472 4.72215L7.32592 3.30862C9.12883 2.43621 10.0303 2 11 2C11.9697 2 12.8712 2.4362 14.6741 3.30862L17.5953 4.72215C19.1984 5.4979 20 5.88577 20 6.5C20 7.11423 19.1984 7.5021 17.5953 8.27785L14.6741 9.69138C12.8712 10.5638 11.9697 11 11 11C10.0303 11 9.12883 10.5638 7.32592 9.69138Z" />
                        <path d="M5 12L7 13" />
                        <path d="M16 4L6 9" />
                    </svg>
                </x-slot>
            </x-link-breadcrumb>
        @endcan

        <x-link-breadcrumb text="COMPRAS" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <circle r="1.5" transform="matrix(1 0 0 -1 17.5 6.5)" />
                    <path
                        d="M2.77423 11.1439C1.77108 12.2643 1.7495 13.9546 2.67016 15.1437C4.49711 17.5033 6.49674 19.5029 8.85633 21.3298C10.0454 22.2505 11.7357 22.2289 12.8561 21.2258C15.8979 18.5022 18.6835 15.6559 21.3719 12.5279C21.6377 12.2187 21.8039 11.8397 21.8412 11.4336C22.0062 9.63798 22.3452 4.46467 20.9403 3.05974C19.5353 1.65481 14.362 1.99377 12.5664 2.15876C12.1603 2.19608 11.7813 2.36233 11.472 2.62811C8.34412 5.31646 5.49781 8.10211 2.77423 11.1439Z" />
                    <path stroke-width="0" fill="currentColor"
                        d="M11.0863 12.9089L11.6162 12.3782L11.0863 12.9089ZM13.3332 10.6657L12.8033 11.1965L13.3332 10.6657ZM11.218 15.4562L11.7479 15.987L11.218 15.4562ZM8.66654 15.3247L9.19643 14.7939L8.66654 15.3247ZM14.5299 10.5308C14.823 10.2381 14.8234 9.76324 14.5308 9.47011C14.2381 9.17697 13.7632 9.17658 13.4701 9.46923L14.5299 10.5308ZM7.47011 15.4594C7.17697 15.752 7.17658 16.2269 7.46923 16.52C7.76189 16.8132 8.23676 16.8136 8.52989 16.5209L7.47011 15.4594ZM13.0644 12.1568C12.9548 12.5563 13.1898 12.9689 13.5893 13.0785C13.9887 13.1881 14.4014 12.9531 14.511 12.5536L13.0644 12.1568ZM8.82372 13.8411C8.86014 13.4285 8.55518 13.0645 8.14257 13.0281C7.72996 12.9916 7.36595 13.2966 7.32953 13.7092L8.82372 13.8411ZM11.6162 12.3782C11.2265 11.9891 11.1584 11.7557 11.1528 11.6524C11.1486 11.5741 11.1725 11.427 11.4234 11.1766L10.3636 10.115C9.9463 10.5317 9.61938 11.0697 9.655 11.7329C9.68929 12.3712 10.0517 12.9358 10.5564 13.4397L11.6162 12.3782ZM11.4234 11.1766C11.7907 10.8099 12.4087 10.8025 12.8033 11.1965L13.8631 10.1349C12.8993 9.17271 11.3327 9.14751 10.3636 10.115L11.4234 11.1766ZM10.6881 14.9255C10.3909 15.2222 10.1553 15.2655 9.97835 15.2459C9.76713 15.2226 9.49422 15.0912 9.19643 14.7939L8.13664 15.8555C8.57981 16.2979 9.15055 16.6637 9.81378 16.7369C10.5113 16.8139 11.181 16.553 11.7479 15.987L10.6881 14.9255ZM10.5564 13.4397C10.9524 13.835 11.0529 14.0944 11.0635 14.2462C11.0719 14.3673 11.0336 14.5806 10.6881 14.9255L11.7479 15.987C12.2667 15.4691 12.6097 14.8552 12.5598 14.1416C12.5121 13.4587 12.1146 12.8757 11.6162 12.3782L10.5564 13.4397ZM13.8631 11.1965L14.5299 10.5308L13.4701 9.46923L12.8033 10.1349L13.8631 11.1965ZM8.13664 14.7939L7.47011 15.4594L8.52989 16.5209L9.19643 15.8555L8.13664 14.7939ZM12.8033 11.1965C13.0689 11.4616 13.1535 11.8318 13.0644 12.1568L14.511 12.5536C14.7394 11.7208 14.5196 10.7903 13.8631 10.1349L12.8033 11.1965ZM9.19643 14.7939C8.91097 14.509 8.79655 14.149 8.82372 13.8411L7.32953 13.7092C7.26204 14.4739 7.54709 15.2669 8.13664 15.8555L9.19643 14.7939Z" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="w-full flex flex-wrap gap-2 ">
        @can('admin.almacen.compras.create')
            <x-link-next href="{{ route('admin.almacen.compras.create') }}" titulo="Registrar">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" x2="12" y1="5" y2="19" />
                    <line x1="5" x2="19" y1="12" y2="12" />
                </svg>
            </x-link-next>
        @endcan

        @can('admin.almacen.compras.payments')
            <x-link-next href="{{ route('admin.almacen.compras.pagos') }}" titulo="Cuentas por pagar">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M7 6.67011C5.93408 6.67011 4.91969 6.5508 4 6.33552C3.04003 6.11081 2 6.8021 2 7.80858V18.8175C2 19.6259 2 20.0301 2.19412 20.4469C2.30483 20.6846 2.55696 21.008 2.75898 21.1714C3.11319 21.4578 3.4088 21.527 4 21.6654C4.91969 21.8807 5.93408 22 7 22C8.91707 22 10.6675 21.6141 12 20.978C13.3325 20.342 15.0829 19.956 17 19.956C18.0659 19.956 19.0803 20.0753 20 20.2906C20.96 20.5153 22 19.824 22 18.8175V7.80858C22 7.00021 22 6.59603 21.8059 6.17921C21.6952 5.94149 21.443 5.61811 21.241 5.45475C20 4.43872 18 5.44223 18 5.44223" />
                    <path
                        d="M14.5 13.5C14.5 14.8807 13.3807 16 12 16C10.6193 16 9.5 14.8807 9.5 13.5C9.5 12.1193 10.6193 11 12 11C13.3807 11 14.5 12.1193 14.5 13.5Z" />
                    <path d="M5.5 14.5L5.5 14.509" />
                    <path d="M18.5 12.4922L18.5 12.5012" />
                    <path d="M9.5 4.5C9.99153 3.9943 11.2998 2 12 2M14.5 4.5C14.0085 3.9943 12.7002 2 12 2M12 2V8" />
                </svg>
            </x-link-next>
        @endcan
    </div>

    @can('admin.almacen.compras')
        <div class="mt-3">
            <livewire:modules.almacen.compras.show-compras />
        </div>
    @endcan
</x-admin-layout>
