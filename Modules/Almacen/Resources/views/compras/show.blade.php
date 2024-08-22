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

        <x-link-breadcrumb text="COMPRAS" route="admin.almacen.compras">
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

        <x-link-breadcrumb text="RESUMEN COMPRA" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 7.5C15 7.5 15.5 7.5 16 8.5C16 8.5 17.5882 6 19 5.5" />
                    <path
                        d="M22 7C22 9.76142 19.7614 12 17 12C14.2386 12 12 9.76142 12 7C12 4.23858 14.2386 2 17 2C19.7614 2 22 4.23858 22 7Z" />
                    <path stroke-width="0" fill="currentColor"
                        d="M2.9 13.816L3.37834 13.2383L3.37834 13.2383L2.9 13.816ZM2.9 16.6667L2.15 16.6667V16.6667H2.9ZM18.3092 21.219L18.8362 21.7526V21.7526L18.3092 21.219ZM3.69081 21.219L3.16379 21.7526L3.16379 21.7526L3.69081 21.219ZM7.37364 11.7778L8.09752 11.5816C7.99917 11.2187 7.64735 10.9847 7.27467 11.0343C6.902 11.0839 6.62364 11.4018 6.62364 11.7778H7.37364ZM2.10213 12.7026L2.80388 12.438L2.10213 12.7026ZM2.4119 10.958L3.05989 11.3356L3.05989 11.3356L2.4119 10.958ZM3.2792 9.46982L2.63122 9.09217H2.63122L3.2792 9.46982ZM2.01147 11.9813L1.26412 11.9183L2.01147 11.9813ZM9.06189 6.75C9.47611 6.75 9.81189 6.41421 9.81189 6C9.81189 5.58579 9.47611 5.25 9.06189 5.25V6.75ZM13.3513 14.559C13.7082 14.3488 13.8272 13.889 13.617 13.5321C13.4068 13.1752 12.947 13.0563 12.5901 13.2665L13.3513 14.559ZM19.85 14.7215C19.85 14.3073 19.5142 13.9715 19.1 13.9715C18.6858 13.9715 18.35 14.3073 18.35 14.7215H19.85ZM2.15 13.816L2.15 16.6667L3.65 16.6667L3.65 13.816L2.15 13.816ZM8.3 22.75H13.7V21.25H8.3V22.75ZM13.7 22.75C14.9518 22.75 15.9653 22.7516 16.7614 22.6458C17.5781 22.5374 18.2779 22.304 18.8362 21.7526L17.7822 20.6853C17.5497 20.9149 17.2177 21.0721 16.5639 21.1589C15.8895 21.2484 14.9937 21.25 13.7 21.25V22.75ZM18.35 16.6667C18.35 17.9452 18.3484 18.8277 18.258 19.4916C18.1707 20.1329 18.0133 20.457 17.7822 20.6853L18.8362 21.7526C19.3958 21.1999 19.6339 20.5049 19.7443 19.6939C19.8516 18.9054 19.85 17.9023 19.85 16.6667H18.35ZM2.15 16.6667C2.15 17.9023 2.14837 18.9054 2.25571 19.6939C2.36611 20.5049 2.60416 21.1999 3.16379 21.7526L4.21784 20.6853C3.98665 20.457 3.82929 20.1329 3.742 19.4916C3.65163 18.8277 3.65 17.9452 3.65 16.6667H2.15ZM8.3 21.25C7.00626 21.25 6.11048 21.2484 5.43609 21.1589C4.78232 21.0721 4.45032 20.9149 4.21784 20.6853L3.16379 21.7526C3.72212 22.304 4.42191 22.5374 5.23864 22.6458C6.03474 22.7516 7.04815 22.75 8.3 22.75V21.25ZM6.62364 11.7778C6.62364 12.8225 5.75576 13.6944 4.65387 13.6944V15.1944C6.55616 15.1944 8.12364 13.6786 8.12364 11.7778H6.62364ZM4.65387 13.6944C4.16509 13.6944 3.72116 13.5222 3.37834 13.2383L2.42166 14.3936C3.02588 14.894 3.80601 15.1944 4.65387 15.1944V13.6944ZM3.37834 13.2383C3.12025 13.0246 2.92117 12.749 2.80388 12.438L1.40038 12.9673C1.61215 13.5288 1.96823 14.0182 2.42166 14.3936L3.37834 13.2383ZM11 13.6944C9.57871 13.6944 8.42067 12.7738 8.09752 11.5816L6.64976 11.974C7.15794 13.8488 8.93188 15.1944 11 15.1944V13.6944ZM3.05989 11.3356L3.92718 9.84747L2.63122 9.09217L1.76392 10.5803L3.05989 11.3356ZM4.49729 7.74163C4.49729 7.20784 4.94277 6.75 5.5236 6.75V5.25C4.14237 5.25 2.99729 6.35167 2.99729 7.74163H4.49729ZM3.92718 9.84747C4.30039 9.20711 4.49729 8.4812 4.49729 7.74163H2.99729C2.99729 8.21444 2.87149 8.6799 2.63122 9.09217L3.92718 9.84747ZM2.80388 12.438C2.75954 12.3204 2.75687 12.3069 2.75414 12.2897C2.75122 12.2713 2.74453 12.2137 2.75882 12.0443L1.26412 11.9183C1.24526 12.1419 1.24264 12.3356 1.2727 12.5249C1.30294 12.7154 1.36218 12.866 1.40038 12.9673L2.80388 12.438ZM1.76392 10.5803C1.52232 10.9948 1.31307 11.3377 1.26412 11.9183L2.75882 12.0443C2.77615 11.8386 2.81176 11.7614 3.05989 11.3356L1.76392 10.5803ZM5.5236 6.75H9.06189V5.25H5.5236V6.75ZM12.5901 13.2665C12.1314 13.5366 11.5874 13.6944 11 13.6944V15.1944C11.8588 15.1944 12.6652 14.963 13.3513 14.559L12.5901 13.2665ZM19.85 16.6667V14.7215H18.35V16.6667H19.85Z" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="w-full flex flex-col gap-8 mx-auto xl:max-w-7xl">
        <div>
            <livewire:modules.almacen.compras.show-compra :compra="$compra" />
        </div>

        @if ($compra->typepayment->isCredito())
            <div>
                <livewire:modules.almacen.compras.show-cuotas-compra :compra="$compra" />
            </div>
        @endif
    </div>
</x-admin-layout>
