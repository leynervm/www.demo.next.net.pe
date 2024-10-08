<x-admin-layout>
    <x-slot name="breadcrumb">
        @canany(['admin.administracion.empresa.create', 'admin.administracion.empresa.edit',
            'admin.administracion.sucursales', 'admin.administracion.employers', 'admin.users',
            'admin.administracion.pricetypes', 'admin.administracion.rangos', 'admin.administracion.typecomprobantes',
            'admin.administracion.units', 'admin.administracion.areas', 'admin.administracion.typepayments'])
            <x-link-breadcrumb text="ADMINISTRACIÓN" route="admin.administracion">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M10 13.3333C10 13.0233 10 12.8683 10.0341 12.7412C10.1265 12.3961 10.3961 12.1265 10.7412 12.0341C10.8683 12 11.0233 12 11.3333 12H12.6667C12.9767 12 13.1317 12 13.2588 12.0341C13.6039 12.1265 13.8735 12.3961 13.9659 12.7412C14 12.8683 14 13.0233 14 13.3333V14C14 15.1046 13.1046 16 12 16C10.8954 16 10 15.1046 10 14V13.3333Z" />
                        <path
                            d="M13.9 13.5H15.0826C16.3668 13.5 17.0089 13.5 17.5556 13.3842C19.138 13.049 20.429 12.0207 20.9939 10.6455C21.1891 10.1704 21.2687 9.59552 21.428 8.4457C21.4878 8.01405 21.5177 7.79823 21.489 7.62169C21.4052 7.10754 20.9932 6.68638 20.4381 6.54764C20.2475 6.5 20.0065 6.5 19.5244 6.5H4.47562C3.99351 6.5 3.75245 6.5 3.56187 6.54764C3.00682 6.68638 2.59477 7.10754 2.51104 7.62169C2.48229 7.79823 2.51219 8.01405 2.57198 8.4457C2.73128 9.59552 2.81092 10.1704 3.00609 10.6455C3.571 12.0207 4.86198 13.049 6.44436 13.3842C6.99105 13.5 7.63318 13.5 8.91743 13.5H10.1" />
                        <path
                            d="M3.5 11.5V13.5C3.5 17.2712 3.5 19.1569 4.60649 20.3284C5.71297 21.5 7.49383 21.5 11.0556 21.5H12.9444C16.5062 21.5 18.287 21.5 19.3935 20.3284C20.5 19.1569 20.5 17.2712 20.5 13.5V11.5" />
                        <path
                            d="M15.5 6.5L15.4227 6.14679C15.0377 4.38673 14.8452 3.50671 14.3869 3.00335C13.9286 2.5 13.3199 2.5 12.1023 2.5H11.8977C10.6801 2.5 10.0714 2.5 9.61309 3.00335C9.15478 3.50671 8.96228 4.38673 8.57727 6.14679L8.5 6.5" />
                    </svg>
                </x-slot>
            </x-link-breadcrumb>
        @endcanany

        <x-link-breadcrumb text="SUCURSALES" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke-width="0.2" stroke="currentColor" fill="currentColor"
                        d="M4 2L4 1.25L3.44607 1.25L3.28317 1.77944L4 2ZM2 8.50006L1.28317 8.2795C1.214 8.5043 1.25429 8.74852 1.392 8.93919L2 8.50006ZM20 2.00008L20.7169 1.77968L20.5541 1.25008L20 1.25008L20 2.00008ZM21.9983 8.50006L22.6063 8.93919C22.744 8.74857 22.7843 8.50442 22.7152 8.27966L21.9983 8.50006ZM10.871 8.18824L11.0592 7.46224L9.60719 7.08587L9.419 7.81188L10.871 8.18824ZM16.625 8.18824L16.8132 7.46224L15.3612 7.08587L15.173 7.81188L16.625 8.18824ZM3.28317 1.77944L1.28317 8.2795L2.71683 8.72062L4.71683 2.22056L3.28317 1.77944ZM19.2831 2.22047L21.2814 8.72046L22.7152 8.27966L20.7169 1.77968L19.2831 2.22047ZM4 2.75L20 2.75008L20 1.25008L4 1.25L4 2.75ZM11.9977 10.2501C11.0787 10.2501 10.2501 9.87627 9.65468 9.27322L8.58728 10.3271C9.45407 11.205 10.663 11.7501 11.9977 11.7501V10.2501ZM17.753 10.2501C16.8338 10.2501 16.0049 9.87604 15.4095 9.27267L14.3419 10.3263C15.2087 11.2047 16.4179 11.7501 17.753 11.7501V10.2501ZM6.24363 10.2501C4.4299 10.2501 3.40735 9.16768 2.608 8.06093L1.392 8.93919C2.26375 10.1462 3.67691 11.7501 6.24363 11.7501V10.2501ZM9.419 7.81188C9.05629 9.21122 7.77386 10.2501 6.24363 10.2501V11.7501C8.46744 11.7501 10.3394 10.2394 10.871 8.18824L9.419 7.81188ZM15.173 7.81188C14.8103 9.21122 13.5279 10.2501 11.9977 10.2501V11.7501C14.2215 11.7501 16.0934 10.2394 16.625 8.18824L15.173 7.81188ZM21.3903 8.06093C20.5912 9.16735 19.567 10.2501 17.753 10.2501V11.7501C20.3195 11.7501 21.7343 10.1465 22.6063 8.93919L21.3903 8.06093Z" />
                    <path d="M6 17H11" />
                    <path
                        d="M18.5 13.5C20.433 13.5 22 15.0376 22 16.9343C22 19.0798 20 20.5 18.5 21.9999C17 20.5 15 19.0351 15 16.9343C15 15.0376 16.567 13.5 18.5 13.5Z" />
                    <path d="M18.5 17L18.509 17" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="w-full flex flex-wrap gap-2 items-start">
        {{-- @if (is_null(mi_empresa()->limitsucursals) || (!is_null(mi_empresa()->limitsucursals) && mi_empresa()->sucursals()->withTrashed()->count() < mi_empresa()->limitsucursals)) --}}
        @can('admin.administracion.sucursales.create')
            <div class="inline-block">
                <livewire:admin.sucursales.create-sucursal :empresa="$empresa">
            </div>
        @endcan
        {{-- @endif --}}

        <x-minicard :title="null">
            @if (is_null(mi_empresa()->limitsucursals))
                <p class="text-colorlabel text-center font-medium text-[10px] leading-3">
                    SUCURSALES ILIMITADAS</p>
            @else
                <h1 class="text-colorlabel text-center font-medium text-3xl">{{ mi_empresa()->limitsucursals }}</h1>
                <p class="text-colorlabel text-center font-medium text-[10px] leading-3">
                    SUCURSALES PERMITIDOS</p>
            @endif
        </x-minicard>
    </div>


    @can('admin.administracion.sucursales')
        <div class="mt-3">
            <livewire:admin.sucursales.show-sucursales>
        </div>
    @endcan
</x-admin-layout>
