<x-app-layout>
    <x-slot name="breadcrumb">
        <x-link-breadcrumb text="LIBRO DE RECLAMACIONES" active>
            <x-slot name="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M16.6127 16.0846C13.9796 17.5677 12.4773 20.6409 12 21.5V8C12.4145 7.25396 13.602 5.11646 15.6317 3.66368C16.4868 3.05167 16.9143 2.74566 17.4572 3.02468C18 3.30371 18 3.91963 18 5.15146V13.9914C18 14.6568 18 14.9895 17.8634 15.2233C17.7267 15.4571 17.3554 15.6663 16.6127 16.0846L16.6127 16.0846Z" />
                    <path
                        d="M12 7.80556C11.3131 7.08403 9.32175 5.3704 5.98056 4.76958C4.2879 4.4652 3.44157 4.31301 2.72078 4.89633C2 5.47965 2 6.42688 2 8.32133V15.1297C2 16.8619 2 17.728 2.4626 18.2687C2.9252 18.8095 3.94365 18.9926 5.98056 19.3589C7.79633 19.6854 9.21344 20.2057 10.2392 20.7285C11.2484 21.2428 11.753 21.5 12 21.5C12.247 21.5 12.7516 21.2428 13.7608 20.7285C14.7866 20.2057 16.2037 19.6854 18.0194 19.3589C20.0564 18.9926 21.0748 18.8095 21.5374 18.2687C22 17.728 22 16.8619 22 15.1297V8.32133C22 6.42688 22 5.47965 21.2792 4.89633C20.5584 4.31301 19 4.76958 18 5.5" />
                </svg>
            </x-slot>
        </x-link-breadcrumb>
    </x-slot>

    <x-card-success titulo="">
        <x-slot:subtitulo>
            <p class="text-colorsubtitleform mb-8 text-sm text-center">
                GRACIAS,
                <br>
                SOLICITUD <b>{{ $claimbook->serie }}-{{ $claimbook->correlativo }}</b> REGISTRADO CORRECTAMENTE
                <br>
                Se ha enviado un correo de su solicitud a {{ $claimbook->email }}
            </p>
        </x-slot>

        <div class="w-full flex justify-center items-center">
            <x-link-button href="{{ route('claimbook.print.pdf', $claimbook) }}">IMPRIMIR</x-link-button>
        </div>

    </x-card-success>
</x-app-layout>
