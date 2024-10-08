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

        <x-link-breadcrumb text="USUARIOS" route="admin.users">
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M18.5045 19.0002H18.9457C19.9805 19.0002 20.8036 18.5287 21.5427 17.8694C23.4202 16.1944 19.0067 14.5 17.5 14.5" />
                    <path
                        d="M15 5.06877C15.2271 5.02373 15.4629 5 15.7048 5C17.5247 5 19 6.34315 19 8C19 9.65685 17.5247 11 15.7048 11C15.4629 11 15.2271 10.9763 15 10.9312" />
                    <path
                        d="M4.78256 15.1112C3.68218 15.743 0.797061 17.0331 2.55429 18.6474C3.41269 19.436 4.36872 20 5.57068 20H12.4293C13.6313 20 14.5873 19.436 15.4457 18.6474C17.2029 17.0331 14.3178 15.743 13.2174 15.1112C10.6371 13.6296 7.36292 13.6296 4.78256 15.1112Z" />
                    <path
                        d="M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>

        <x-link-breadcrumb text="REGISTRAR USUARIO" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M18.5045 19.0002H18.9457C19.9805 19.0002 20.8036 18.5287 21.5427 17.8694C23.4202 16.1944 19.0067 14.5 17.5 14.5" />
                    <path
                        d="M15 5.06877C15.2271 5.02373 15.4629 5 15.7048 5C17.5247 5 19 6.34315 19 8C19 9.65685 17.5247 11 15.7048 11C15.4629 11 15.2271 10.9763 15 10.9312" />
                    <path
                        d="M4.78256 15.1112C3.68218 15.743 0.797061 17.0331 2.55429 18.6474C3.41269 19.436 4.36872 20 5.57068 20H12.4293C13.6313 20 14.5873 19.436 15.4457 18.6474C17.2029 17.0331 14.3178 15.743 13.2174 15.1112C10.6371 13.6296 7.36292 13.6296 4.78256 15.1112Z" />
                    <path
                        d="M13 7C13 9.20914 11.2091 11 9 11C6.79086 11 5 9.20914 5 7C5 4.79086 6.79086 3 9 3C11.2091 3 13 4.79086 13 7Z" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="w-full mx-auto xl:max-w-7xl lg:px-3 animate__animated animate__fadeIn animate__faster">
        <livewire:admin.users.create-user />
    </div>
</x-admin-layout>
