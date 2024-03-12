<x-app-layout>
    @can('admin.roles.edit')
        <x-slot name="breadcrumb">
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

            @can('admin.roles')
                <x-link-breadcrumb text="ROLES" route="admin.roles">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M12.5 22H6.59087C5.04549 22 3.81631 21.248 2.71266 20.1966C0.453365 18.0441 4.1628 16.324 5.57757 15.4816C7.97679 14.053 10.8425 13.6575 13.5 14.2952" />
                            <path
                                d="M16.5 6.5C16.5 8.98528 14.4853 11 12 11C9.51472 11 7.5 8.98528 7.5 6.5C7.5 4.01472 9.51472 2 12 2C14.4853 2 16.5 4.01472 16.5 6.5Z" />
                            <path stroke-width=".3" fill="currentColor"
                                d="M16.0803 21.8573L15.7761 22.5428L15.7761 22.5428L16.0803 21.8573ZM15.1332 20.8425L14.4337 21.113H14.4337L15.1332 20.8425ZM21.8668 20.8425L22.5663 21.113L22.5663 21.113L21.8668 20.8425ZM20.9197 21.8573L21.2239 22.5428L21.2239 22.5428L20.9197 21.8573ZM20.9197 16.5177L21.2239 15.8322L20.9197 16.5177ZM21.8668 17.5325L22.5663 17.262L22.5663 17.262L21.8668 17.5325ZM16.0803 16.5177L15.7761 15.8322L16.0803 16.5177ZM15.1332 17.5325L14.4337 17.262L15.1332 17.5325ZM16 16.375C16 16.7892 16.3358 17.125 16.75 17.125C17.1642 17.125 17.5 16.7892 17.5 16.375H16ZM19.5 16.375C19.5 16.7892 19.8358 17.125 20.25 17.125C20.6642 17.125 21 16.7892 21 16.375H19.5ZM17.625 17.125H19.375V15.625H17.625V17.125ZM19.375 21.25H17.625V22.75H19.375V21.25ZM17.625 21.25C17.2063 21.25 16.9325 21.2495 16.7222 21.2342C16.5196 21.2193 16.4338 21.1936 16.3845 21.1718L15.7761 22.5428C16.0484 22.6637 16.3272 22.7093 16.6128 22.7302C16.8905 22.7505 17.2283 22.75 17.625 22.75V21.25ZM14.25 19.1875C14.25 19.6147 14.2496 19.9702 14.2682 20.2611C14.2871 20.5577 14.3278 20.839 14.4337 21.113L15.8328 20.5721C15.8054 20.5014 15.7795 20.3921 15.7651 20.1658C15.7504 19.9336 15.75 19.6339 15.75 19.1875H14.25ZM16.3845 21.1718C16.1471 21.0664 15.9427 20.8566 15.8328 20.5721L14.4337 21.113C14.6789 21.7474 15.1559 22.2676 15.7761 22.5428L16.3845 21.1718ZM21.25 19.1875C21.25 19.6339 21.2496 19.9336 21.2349 20.1658C21.2205 20.3921 21.1946 20.5014 21.1672 20.5721L22.5663 21.113C22.6722 20.839 22.7129 20.5577 22.7318 20.2611C22.7504 19.9702 22.75 19.6147 22.75 19.1875H21.25ZM19.375 22.75C19.7717 22.75 20.1095 22.7505 20.3872 22.7302C20.6728 22.7093 20.9516 22.6637 21.2239 22.5428L20.6155 21.1718C20.5662 21.1936 20.4804 21.2193 20.2778 21.2342C20.0675 21.2495 19.7937 21.25 19.375 21.25V22.75ZM21.1672 20.5721C21.0573 20.8566 20.8529 21.0664 20.6155 21.1718L21.2239 22.5428C21.8441 22.2676 22.3211 21.7474 22.5663 21.113L21.1672 20.5721ZM19.375 17.125C19.7937 17.125 20.0675 17.1255 20.2778 17.1408C20.4804 17.1557 20.5662 17.1814 20.6155 17.2032L21.2239 15.8322C20.9516 15.7113 20.6728 15.6657 20.3872 15.6448C20.1095 15.6245 19.7717 15.625 19.375 15.625V17.125ZM22.75 19.1875C22.75 18.7603 22.7504 18.4048 22.7318 18.1139C22.7129 17.8173 22.6722 17.536 22.5663 17.262L21.1672 17.8029C21.1946 17.8736 21.2205 17.9829 21.2349 18.2092C21.2496 18.4414 21.25 18.7411 21.25 19.1875H22.75ZM20.6155 17.2032C20.8529 17.3086 21.0573 17.5184 21.1672 17.8029L22.5663 17.262C22.3211 16.6277 21.8441 16.1074 21.2239 15.8322L20.6155 17.2032ZM17.625 15.625C17.2283 15.625 16.8905 15.6245 16.6128 15.6448C16.3272 15.6657 16.0484 15.7113 15.7761 15.8322L16.3845 17.2032C16.4338 17.1814 16.5196 17.1557 16.7222 17.1408C16.9325 17.1255 17.2063 17.125 17.625 17.125V15.625ZM15.75 19.1875C15.75 18.7411 15.7504 18.4414 15.7651 18.2092C15.7795 17.9829 15.8054 17.8736 15.8328 17.8029L14.4337 17.262C14.3278 17.536 14.2871 17.8173 14.2682 18.1139C14.2496 18.4048 14.25 18.7603 14.25 19.1875H15.75ZM15.7761 15.8322C15.1559 16.1074 14.6789 16.6277 14.4337 17.262L15.8328 17.8029C15.9427 17.5184 16.1471 17.3086 16.3845 17.2032L15.7761 15.8322ZM17.5 16.375V14.6875H16V16.375H17.5ZM19.5 14.6875V16.375H21V14.6875H19.5ZM18.5 13.75C19.0782 13.75 19.5 14.1952 19.5 14.6875H21C21 13.3158 19.8548 12.25 18.5 12.25V13.75ZM17.5 14.6875C17.5 14.1952 17.9218 13.75 18.5 13.75V12.25C17.1452 12.25 16 13.3158 16 14.6875H17.5Z" />
                        </svg>
                    </x-slot>
                </x-link-breadcrumb>
            @endcan

            <x-link-breadcrumb text="VER ROL" active>
                <x-slot name="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M11.0658 22C9.43835 22 8.11054 21.966 6.6557 21.9009C4.92675 21.8235 3.50598 20.515 3.27504 18.8447C3.12431 17.7547 3 16.6376 3 15.5C3 14.3624 3.12431 13.2453 3.27504 12.1553C3.50598 10.485 4.92675 9.17649 6.6557 9.09909C8.11054 9.03397 9.5884 9 11.2159 9C12.8433 9 14.3212 9.03397 15.776 9.09909C17.2713 9.16603 18.536 10.1538 19 11.5" />
                        <path d="M6.5 9V6.5C6.5 4.01472 8.51472 2 11 2C13.4853 2 15.5 4.01472 15.5 6.5V9" />
                        <path d="M17 22L17 14M13 18H21" />
                    </svg>
                </x-slot>
            </x-link-breadcrumb>
        </x-slot>

        <div class="mt-3 w-full mx-auto animate__animated animate__fadeIn animate__faster">
            <livewire:admin.roles.show-rol :role="$role" />
        </div>
    @endcan
</x-app-layout>
