<x-admin-layout>
    <x-slot name="breadcrumb">
        @if (Module::isEnabled('Almacen'))
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
        @endif

        @if (Module::isEnabled('Almacen') || Module::isEnabled('Ventas'))
            @can('admin.almacen.productos')
                <x-link-breadcrumb text="PRODUCTOS" route="admin.almacen.productos">
                    <x-slot name="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.5 17V6H19.5V17H4.5Z" />
                            <path d="M4.5 6L6.5 2.00001L17.5 2L19.5 6" />
                            <path d="M10 9H14" />
                            <path
                                d="M11.9994 19.5V22M11.9994 19.5L6.99939 19.5M11.9994 19.5H16.9994M6.99939 19.5H1.99939V22M6.99939 19.5V22M16.9994 19.5H22L21.9994 22M16.9994 19.5V22" />
                        </svg>
                    </x-slot>
                </x-link-breadcrumb>
            @endcan
        @endif

        <x-link-breadcrumb text="REGISTRAR PRODUCTO" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" stroke-width="1"
                    stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke-width="1.5"
                        d="M12 22C11.1818 22 10.4002 21.6754 8.83693 21.0262C4.94564 19.4101 3 18.6021 3 17.2429V7.74463M12 22C12.8182 22 13.5998 21.6754 15.1631 21.0262C19.0544 19.4101 21 18.6021 21 17.2429V7.74463M12 22V12.1687M21 7.74463C21 8.3485 20.1984 8.72983 18.5953 9.49248L15.6741 10.8822C13.8712 11.7399 12.9697 12.1687 12 12.1687M21 7.74463C21 7.14076 20.1984 6.75944 18.5953 5.99678L16.5 5M3 7.74463C3 8.3485 3.80157 8.72983 5.40472 9.49248L8.32592 10.8822C10.1288 11.7399 11.0303 12.1687 12 12.1687M3 7.74463C3 7.14076 3.80157 6.75944 5.40472 5.99678L7.5 5M6 13.1518L8 14.135" />
                    <path
                        d="M12.75 2C12.75 1.58579 12.4142 1.25 12 1.25C11.5858 1.25 11.25 1.58579 11.25 2L12.75 2ZM13 8.17157L13.5705 8.65849L13.5705 8.65849L13 8.17157ZM14.5705 7.48691C14.8394 7.17186 14.802 6.69846 14.4869 6.42955C14.1719 6.16063 13.6985 6.19804 13.4295 6.51309L14.5705 7.48691ZM10.5705 6.51309C10.3015 6.19804 9.82814 6.16063 9.51309 6.42955C9.19804 6.69846 9.16063 7.17186 9.42955 7.48691L10.5705 6.51309ZM11 8.17157L10.4295 8.65848L10.4295 8.65849L11 8.17157ZM12.75 9L12.75 2L11.25 2L11.25 9H12.75ZM13.5705 8.65849L14.5705 7.48691L13.4295 6.51309L12.4295 7.68466L13.5705 8.65849ZM9.42955 7.48691L10.4295 8.65848L11.5705 7.68466L10.5705 6.51309L9.42955 7.48691ZM12.4295 7.68466C12.1795 7.97761 12.0408 8.13754 11.9332 8.23372C11.8363 8.32036 11.8774 8.25 12 8.25L12 9.75C12.4155 9.75 12.7209 9.54157 12.9329 9.35206C13.1342 9.1721 13.3491 8.91782 13.5705 8.65849L12.4295 7.68466ZM10.4295 8.65849C10.6509 8.91782 10.8658 9.1721 11.0671 9.35206C11.2791 9.54157 11.5845 9.75 12 9.75L12 8.25C12.1226 8.25 12.1637 8.32036 12.0668 8.23372C11.9592 8.13754 11.8205 7.97761 11.5705 7.68466L10.4295 8.65849Z" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <div class="mx-auto xl:max-w-7xl">
        <livewire:modules.almacen.productos.create-producto />
    </div>
</x-admin-layout>
