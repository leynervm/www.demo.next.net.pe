<x-admin-layout>
    <x-slot name="breadcrumb">
        @canany(['admin.cajas', 'admin.cajas.methodpayments', 'admin.cajas.movimientos', 'admin.cajas.mensuales.create',
            'admin.cajas.aperturas', 'admin.administracion.employers.adelantos.create', 'admin.cajas.conceptos'])
            <x-link-breadcrumb text="CAJAS" route="admin.cajas">
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="m14,18c4.4183,0 8,-3.5817 8,-8c0,-4.41828 -3.5817,-8 -8,-8c-4.41828,0 -8,3.58172 -8,8c0,4.4183 3.58172,8 8,8z" />
                        <path
                            d="m3.15657,11c-0.73134,1.1176 -1.15657,2.4535 -1.15657,3.8888c0,3.9274 3.18378,7.1112 7.11116,7.1112c1.43534,0 2.77124,-0.4252 3.88884,-1.1566" />
                        <path
                            d="m14,7c-1.1046,0 -2,0.67157 -2,1.5c0,0.82843 0.8954,1.5 2,1.5c1.1046,0 2,0.6716 2,1.5c0,0.8284 -0.8954,1.5 -2,1.5m0,-6c0.8708,0 1.6116,0.4174 1.8862,1m-1.8862,5c-0.8708,0 -1.6116,-0.4174 -1.8862,-1m1.8862,1" />
                    </svg>
                </x-slot>
            </x-link-breadcrumb>
        @endcanany

        <x-link-breadcrumb text="CAJAS APERTURADAS" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M16.6667 14L7.33333 14C5.14718 14 4.0541 14 3.27927 14.5425C2.99261 14.7433 2.74327 14.9926 2.54254 15.2793C2 16.0541 2 17.1472 2 19.3333C2 20.4264 2 20.9729 2.27127 21.3604C2.37164 21.5037 2.4963 21.6284 2.63963 21.7287C3.02705 22 3.57359 22 4.66667 22L19.3333 22C20.4264 22 20.9729 22 21.3604 21.7287C21.5037 21.6284 21.6284 21.5037 21.7287 21.3604C22 20.9729 22 20.4264 22 19.3333C22 17.1472 22 16.0541 21.4575 15.2793C21.2567 14.9926 21.0074 14.7433 20.7207 14.5425C19.9459 14 18.8528 14 16.6667 14Z" />
                    <path
                        d="M20 14L19.593 10.3374C19.311 7.79863 19.1699 6.52923 18.3156 5.76462C17.4614 5 16.1842 5 13.6297 5L10.3703 5C7.81585 5 6.53864 5 5.68436 5.76462C4.83009 6.52923 4.68904 7.79862 4.40695 10.3374L4 14" />
                    <path d="M11.5 2H14M16.5 2H14M14 2V5" />
                    <path
                        d="M9 17.5L9.99615 18.1641C10.3247 18.3831 10.7107 18.5 11.1056 18.5H12.8944C13.2893 18.5 13.6753 18.3831 14.0038 18.1641L15 17.5" />
                    <path d="M8 8H10" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="mt-3 flex gap-2">
        @if ($monthbox)
            @if ($monthbox->isUsing())
                @if ($openbox)
                    @if (!$openbox->isActivo())
                        <livewire:admin.aperturas.create-apertura />
                    @endif
                @else
                    <livewire:admin.aperturas.create-apertura />
                @endif
            @else
                @can('admin.cajas.mensuales')
                    <x-link-next href="{{ route('admin.cajas.mensuales') }}" titulo="Aperturar caja mensual"
                        class="text-orange-500 hover:shadow-orange-500 bg-transparent">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round"
                            class="h-6 w-6 block text-white animate-bounce bg-orange-500 p-1 rounded-full scale-110">
                            <path
                                d="M17 14.998V16.998M17.009 18.998H17M22 16.998C22 19.7594 19.7614 21.998 17 21.998C14.2386 21.998 12 19.7594 12 16.998C12 14.2366 14.2386 11.998 17 11.998C19.7614 11.998 22 14.2366 22 16.998Z" />
                            <path
                                d="M20.232 10.054C20.712 9.51405 21.54 8.69805 21.4958 8.36573C21.5298 8.04251 21.3548 7.73888 21.0049 7.13163L20.5114 6.27503C20.1381 5.6272 19.9514 5.30328 19.6338 5.17412C19.3163 5.04495 18.9571 5.14688 18.2388 5.35072L17.0185 5.69442C16.5599 5.80017 16.0788 5.74018 15.66 5.52503L15.3231 5.33066C14.9641 5.10067 14.6879 4.76157 14.535 4.36298L14.201 3.36559C13.9815 2.70558 13.8717 2.37557 13.6103 2.18681C13.3489 1.99805 13.0017 1.99805 12.3074 1.99805H11.1926C10.4982 1.99805 10.151 1.99805 9.88973 2.18681C9.62833 2.37557 9.51853 2.70558 9.29893 3.36559L8.96503 4.36298C8.81213 4.76157 8.53593 5.10067 8.17683 5.33066L7.83993 5.52503C7.42123 5.74018 6.94003 5.80017 6.48143 5.69442L5.26124 5.35072C4.54294 5.14688 4.18374 5.04495 3.86614 5.17412C3.54854 5.30328 3.36194 5.6272 2.98864 6.27503L2.49504 7.13163C2.14515 7.73888 1.97025 8.04251 2.00415 8.36573C2.03815 8.68895 2.27235 8.94942 2.74074 9.47036L3.77184 10.623C4.02374 10.942 4.20274 11.498 4.20274 11.9978C4.20274 12.498 4.02384 13.0538 3.77184 13.3729L2.74074 14.5256C2.27235 15.0465 2.03815 15.307 2.00415 15.6302C1.97025 15.9535 2.14515 16.2571 2.49504 16.8643L2.98864 17.7209C3.36194 18.3687 3.54854 18.6927 3.86614 18.8218C4.18374 18.951 4.54294 18.8491 5.26124 18.6452L6.48143 18.3015C6.94013 18.1957 7.42133 18.2558 7.84013 18.471L8.17693 18.6654C8.53603 18.8954 8.81213 19.2344 8.96493 19.633L9.29893 20.6305C9.51853 21.2905 9.63993 21.6336 9.84 21.778C9.9 21.8214 10.14 22.018 10.728 22" />
                            <path
                                d="M14.1599 9.44605C13.3199 8.76205 12.6599 8.49805 11.6999 8.49805C9.89986 8.52205 8.25586 10.009 8.25586 11.942C8.25586 13.0077 8.57986 13.682 9.19186 14.39" />
                        </svg>
                    </x-link-next>
                @endcan
            @endif
        @else
            @can('admin.cajas.mensuales.create')
                <x-link-next href="{{ route('admin.cajas.mensuales') }}" titulo="Aperturar caja mensual"
                    class="text-orange-500 bg-transparent">
                    <x-icon-config />
                </x-link-next>
            @else
                <x-link-next href="#" titulo="Aperturar caja mensual" class="text-orange-500 bg-transparent">
                    <x-icon-config />
                </x-link-next>
            @endcan
        @endif
    </div>

    @can('admin.cajas.aperturas')
        <div class="">
            <livewire:admin.aperturas.show-aperturas />
        </div>
    @endcan
</x-admin-layout>
