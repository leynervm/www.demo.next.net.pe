<div>
    {{-- {{ $guia }} --}}
    <div class="w-full flex flex-col gap-8">
        <div class="w-full flex flex-col gap-8">
            <x-form-card titulo="RESUMEN GUÍA REMISIÓN">
                <p class="text-colorminicard text-xl font-semibold">
                    {{ $guia->seriecompleta }}
                    <small class="text-sm">{{ $guia->seriecomprobante->typecomprobante->name }}</small>
                </p>

                <div class="w-full flex flex-col gap-2 bg-body p-3 rounded-md">

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        MOTIVO TRASLADO :
                        <span class="font-medium inline-block">{{ $guia->motivotraslado->name }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        MODALIDAD TRANSPORTE :
                        <span class="font-medium inline-block">{{ $guia->modalidadtransporte->name }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        FECHA TRASLADO :
                        <span class="font-medium inline-block">{{ formatDate($guia->datetraslado, 'DD MMMM Y') }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        PESO BRUTO TOTAL :
                        <span class="font-medium inline-block">{{ $guia->peso }} {{ $guia->unit }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        DESCRIPCIÓN :
                        <span class="font-medium inline-block">{{ $guia->note }}</span>
                    </h1>

                    @if ($guia->indicadorvehiculosml)
                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            PLACA VEHÍCULO :
                            <span class="font-medium inline-block">{{ $guia->placavehiculo }}</span>
                        </h1>
                    @endif

                    @if ($guia->comprobante)
                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            COMPROBANTE REFERENCIA EMITIDO :
                            <span class="font-medium inline-block">{{ $guia->comprobante->seriecompleta }}</span>
                        </h1>
                    @endif

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        TRASLADO EN VEHÍCULOS DE CATEGORÍA M1 O L :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadorvehiculosml == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        RETORNO DE VEHÍCULO VACÍO :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadorvehretorvacio == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        RETORNO DE VEHÍCULO CON ENVASES O EMBALAJES VACÍOS :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadorvehretorenvacios == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        TRANSBORDO PROGRAMADO :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadortransbordo == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        TRASLADO TOTAL DE LA DAM O LA DS :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadordamds == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        REGISTRO DE VEHÍCULOS Y CONDUCTORES DEL TRANSPORTISTA :
                        <span class="font-medium inline-block">
                            {{ $guia->indicadorconductor == 1 ? 'SI' : 'NO' }}</span>
                    </h1>

                    @if ($guia->motivotraslado->code == '03' || $guia->motivotraslado->code == '13')
                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            COMPRADOR :
                            <span class="font-medium inline-block">
                                @if ($guia->motivotraslado->code == '03' || $guia->motivotraslado->code == '13')
                                    {{ $guia->client->document }},
                                    {{ $guia->client->name }}
                                @endif
                            </span>
                        </h1>
                    @endif

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        LUGAR DE EMISIÓN :
                        <span class="font-medium inline-block">
                            {{ $guia->ubigeoorigen->region }},
                            {{ $guia->ubigeoorigen->provincia }},
                            {{ $guia->ubigeoorigen->distrito }},
                            {{ $guia->ubigeoorigen->ubigeo_inei }}
                            @if ($guia->motivotraslado->code == '04')
                                (ANEXO : {{ $guia->anexoorigen }})
                            @endif
                        </span>
                    </h1>

                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        LUGAR DE DESTINO :
                        <span class="font-medium inline-block">
                            {{ $guia->ubigeodestino->region }},
                            {{ $guia->ubigeodestino->provincia }},
                            {{ $guia->ubigeodestino->distrito }},
                            {{ $guia->ubigeodestino->ubigeo_inei }}
                            @if ($guia->motivotraslado->code == '04')
                                (ANEXO : {{ $guia->anexodestino }})
                            @endif
                        </span>
                    </h1>
                </div>
            </x-form-card>

            @if ($guia->guiable)
                <x-form-card titulo="COMPROBANTE RELACIONADO">
                    <div class="w-full flex flex-col gap-2">
                        <p class="text-colorminicard text-2xl font-semibold">
                            {{ $guia->guiable->seriecompleta }}
                            <small
                                class="text-sm">{{ $guia->guiable->seriecomprobante->typecomprobante->descripcion }}</small>
                        </p>

                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            CLIENTE :
                            <span class="font-medium inline-block">
                                {{ $guia->guiable->client->document }},
                                {{ $guia->guiable->client->name }}</span>
                        </h1>

                        <div class="flex items-center justify-start gap-1">
                            <button
                                class="p-1.5 bg-red-800 text-white block rounded-lg transition-colors duration-150">
                                <svg class="w-4 h-4 block scale-110 " xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path
                                        d="M7 18V15.5M7 15.5V14C7 13.5286 7 13.2929 7.15377 13.1464C7.30754 13 7.55503 13 8.05 13H8.75C9.47487 13 10.0625 13.5596 10.0625 14.25C10.0625 14.9404 9.47487 15.5 8.75 15.5H7ZM21 13H19.6875C18.8625 13 18.4501 13 18.1938 13.2441C17.9375 13.4882 17.9375 13.881 17.9375 14.6667V15.5M17.9375 18V15.5M17.9375 15.5H20.125M15.75 15.5C15.75 16.8807 14.5747 18 13.125 18C12.7979 18 12.6343 18 12.5125 17.933C12.2208 17.7726 12.25 17.448 12.25 17.1667V13.8333C12.25 13.552 12.2208 13.2274 12.5125 13.067C12.6343 13 12.7979 13 13.125 13C14.5747 13 15.75 14.1193 15.75 15.5Z" />
                                    <path
                                        d="M15 22H10.7273C7.46607 22 5.83546 22 4.70307 21.2022C4.37862 20.9736 4.09058 20.7025 3.8477 20.3971C3 19.3313 3 17.7966 3 14.7273V12.1818C3 9.21865 3 7.73706 3.46894 6.55375C4.22281 4.65142 5.81714 3.15088 7.83836 2.44135C9.09563 2 10.6698 2 13.8182 2C15.6173 2 16.5168 2 17.2352 2.2522C18.3902 2.65765 19.3012 3.5151 19.732 4.60214C20 5.27832 20 6.12494 20 7.81818V10" />
                                    <path
                                        d="M3 12C3 10.1591 4.49238 8.66667 6.33333 8.66667C6.99912 8.66667 7.78404 8.78333 8.43137 8.60988C9.00652 8.45576 9.45576 8.00652 9.60988 7.43136C9.78333 6.78404 9.66667 5.99912 9.66667 5.33333C9.66667 3.49238 11.1591 2 13 2" />
                                </svg>
                            </button>
                            <button
                                class="p-1.5 bg-neutral-900 text-white block rounded-lg transition-colors duration-150">
                                <svg class="w-4 h-4 block scale-110" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path
                                        d="M7.35396 18C5.23084 18 4.16928 18 3.41349 17.5468C2.91953 17.2506 2.52158 16.8271 2.26475 16.3242C1.87179 15.5547 1.97742 14.5373 2.18868 12.5025C2.36503 10.8039 2.45321 9.95455 2.88684 9.33081C3.17153 8.92129 3.55659 8.58564 4.00797 8.35353C4.69548 8 5.58164 8 7.35396 8H16.646C18.4184 8 19.3045 8 19.992 8.35353C20.4434 8.58564 20.8285 8.92129 21.1132 9.33081C21.5468 9.95455 21.635 10.8039 21.8113 12.5025C22.0226 14.5373 22.1282 15.5547 21.7352 16.3242C21.4784 16.8271 21.0805 17.2506 20.5865 17.5468C19.8307 18 18.7692 18 16.646 18" />
                                    <path
                                        d="M17 8V6C17 4.11438 17 3.17157 16.4142 2.58579C15.8284 2 14.8856 2 13 2H11C9.11438 2 8.17157 2 7.58579 2.58579C7 3.17157 7 4.11438 7 6V8" />
                                    <path
                                        d="M13.9887 16L10.0113 16C9.32602 16 8.98337 16 8.69183 16.1089C8.30311 16.254 7.97026 16.536 7.7462 16.9099C7.57815 17.1904 7.49505 17.5511 7.32884 18.2724C7.06913 19.3995 6.93928 19.963 7.02759 20.4149C7.14535 21.0174 7.51237 21.5274 8.02252 21.7974C8.40513 22 8.94052 22 10.0113 22L13.9887 22C15.0595 22 15.5949 22 15.9775 21.7974C16.4876 21.5274 16.8547 21.0174 16.9724 20.4149C17.0607 19.963 16.9309 19.3995 16.6712 18.2724C16.505 17.5511 16.4218 17.1904 16.2538 16.9099C16.0297 16.536 15.6969 16.254 15.3082 16.1089C15.0166 16 14.674 16 13.9887 16Z" />
                                </svg>
                            </button>

                        </div>
                    </div>
                </x-form-card>
            @endif

            <x-form-card titulo="DESTINATARIO">
                <div class="w-full bg-body p-3 rounded-md">
                    <h1 class="text-colorminicard text-xs font-semibold">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                        </svg>
                        DESTINATARIO :
                        <span class="font-medium inline-block">
                            {{ $guia->documentdestinatario }},
                            {{ $guia->namedestinatario }}</span>
                    </h1>
                </div>
            </x-form-card>

            @if ($guia->modalidadtransporte->code == '01' && $guia->indicadorvehiculosml == '0')
                <x-form-card titulo="TRANSPORTISTA">
                    <div class="w-full bg-body p-3 rounded-md">
                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            TRANSPORTISTA :
                            <span class="font-medium inline-block">
                                {{ $guia->ructransport }},
                                {{ $guia->nametransport }}</span>
                        </h1>
                    </div>
                </x-form-card>
            @endif

            @if ($guia->motivotraslado->code == '02' || $guia->motivotraslado->code == '07' || $guia->motivotraslado->code == '13')
                <x-form-card titulo="PROVEEDOR" class="animate__animated animate__fadeInDown">
                    <div class="w-full bg-body p-3 rounded-md">
                        <h1 class="text-colorminicard text-xs font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 inline-block text-next-500"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="M21.8606 5.39176C22.2875 6.49635 21.6888 7.2526 20.5301 7.99754C19.5951 8.5986 18.4039 9.24975 17.1417 10.363C15.9044 11.4543 14.6968 12.7687 13.6237 14.0625C12.5549 15.351 11.6465 16.586 11.0046 17.5005C10.5898 18.0914 10.011 18.9729 10.011 18.9729C9.60281 19.6187 8.86895 20.0096 8.08206 19.9998C7.295 19.99 6.57208 19.5812 6.18156 18.9251C5.18328 17.248 4.41296 16.5857 4.05891 16.3478C3.11158 15.7112 2 15.6171 2 14.1335C2 12.9554 2.99489 12.0003 4.22216 12.0003C5.08862 12.0323 5.89398 12.373 6.60756 12.8526C7.06369 13.1591 7.54689 13.5645 8.04948 14.0981C8.63934 13.2936 9.35016 12.3653 10.147 11.4047C11.3042 10.0097 12.6701 8.51309 14.1349 7.22116C15.5748 5.95115 17.2396 4.76235 19.0042 4.13381C20.1549 3.72397 21.4337 4.28718 21.8606 5.39176Z" />
                            </svg>
                            PROVEEDOR :
                            <span class="font-medium inline-block">
                                {{ $guia->rucproveedor }},
                                {{ $guia->nameproveedor }}</span>
                        </h1>
                    </div>
                </x-form-card>
            @endif
        </div>

        @if ($guia->modalidadtransporte->code == '02' && $guia->indicadorvehiculosml == '0')
            <x-form-card titulo="CONDUCTORES VEHÍCULO">
                <div class="w-full relative rounded flex flex-wrap lg:flex-nowrap gap-3">
                    @if ($guia->codesunat != '0')
                        <div class="w-full lg:w-96 lg:flex-shrink-0 bg-body p-3 rounded relative"
                            x-data="{ loading: false }">
                            <form wire:submit.prevent="savedriver" class="w-full flex flex-col gap-2">
                                <div class="w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-1">
                                    <div class="w-full">
                                        <x-label value="Documento :" />
                                        <div class="w-full inline-flex">
                                            <x-input class="block w-full prevent numeric"
                                                wire:model.defer="documentdriver" wire:keydown.enter="getDriver"
                                                minlength="0" maxlength="11" />
                                            <x-button-add class="px-2" wire:click="getDriver"
                                                wire:loading.attr="disable">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8" />
                                                    <path d="m21 21-4.3-4.3" />
                                                </svg>
                                            </x-button-add>
                                        </div>
                                        <x-jet-input-error for="documentdriver" />
                                    </div>

                                    <div class="w-full">
                                        <x-label value="Nombres :" />
                                        <x-input class="block w-full" wire:model.defer="namedriver"
                                            placeholder="Nombres del conductor del vehículo..." />
                                        <x-jet-input-error for="namedriver" />
                                    </div>

                                    <div class="w-full">
                                        <x-label value="Apellidos :" />
                                        <x-input class="block w-full" wire:model.defer="lastname"
                                            placeholder="Nombres del conductor del vehículo..." />
                                        <x-jet-input-error for="lastname" />
                                    </div>

                                    <div class="w-full">
                                        <x-label value="Licencia conducir:" />
                                        <x-input class="block w-full" wire:model.defer="licencia"
                                            placeholder="Licencia del conductor del vehículo..." />
                                        <x-jet-input-error for="licencia" />
                                    </div>
                                </div>
                                <div class="w-full flex justify-end">
                                    <x-button type="submit">{{ __('REGISTRAR') }}</x-button>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="w-full relative rounded">
                        @if (count($guia->transportdrivers))
                            <div class="w-full">
                                <x-table>
                                    <x-slot name="header">
                                        <tr>
                                            <th class="p-2 text-left">DOCUMENTO</th>
                                            <th class="p-2 text-left">NOMBRES</th>
                                            <th class="p-2 text-center">LICENCIA</th>
                                            @if ($guia->codesunat != '0')
                                                <th class="p-2">OPCIONES</th>
                                            @endif
                                        </tr>
                                    </x-slot>
                                    <x-slot name="body">
                                        @foreach ($guia->transportdrivers as $item)
                                            <tr class="text-[10px]">
                                                <td class="p-2">
                                                    {{ $item->document }}
                                                    @if ($item->principal)
                                                        <x-span-text text="PRINCIPAL"
                                                            class="!tracking-normal leading-3 ml-1" type="green" />
                                                    @else
                                                        <x-span-text text="SECUNDARIO"
                                                            class="!tracking-normal leading-3 ml-1" />
                                                    @endif
                                                </td>
                                                <td class="p-2">{{ $item->name }} {{ $item->lastname }}</td>
                                                <td class="p-2 text-center">{{ $item->licencia }}</td>
                                                @if ($guia->codesunat != '0')
                                                    <td class="text-center align-middle">
                                                        <x-button-delete
                                                            onclick="confirmDeletedriver({{ $item }})"
                                                            wire:loading.attr="disabled" />
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </x-slot>
                                </x-table>
                            </div>
                        @endif
                    </div>
                </div>
            </x-form-card>

            <x-form-card titulo="VEHÍCULOS TRANSPORTE">
                <div class="w-full relative rounded flex flex-wrap md:flex-nowrap gap-3">
                    @if ($guia->codesunat != '0')
                        <div class="w-full md:w-96 md:flex-shrink-0 bg-body p-3 rounded relative"
                            x-data="{ loading: false }">
                            <form wire:submit.prevent="savevehiculo" class="w-full flex flex-col gap-2">
                                <div class="w-full">
                                    <x-label value="Placa vehículo :" />
                                    <x-input class="block w-full" wire:model.defer="placa"
                                        placeholder="placa del del vehículo transporte..." />
                                    <x-jet-input-error for="placa" />
                                </div>

                                <div class="w-full mt-3 flex justify-end">
                                    <x-button type="submit">{{ __('AGREGAR') }}</x-button>
                                </div>
                            </form>

                            <div x-show="loading" wire:loading.flex wire:target="savevehiculo"
                                class="loading-overlay rounded">
                                <x-loading-next />
                            </div>
                        </div>
                    @endif
                    <div class="w-full relative rounded">
                        @if (count($guia->transportvehiculos))
                            <div class="w-full flex flex-wrap items-start gap-2">
                                @foreach ($guia->transportvehiculos as $item)
                                    <x-minicard :title="'PLACA: ' . $item->placa" size="md">

                                        <div class="text-center">
                                            <x-span-text :text="$item->principal == 1 ? 'PRINCIPAL' : 'SECUNDARIO'" class="leading-3 !tracking-normal"
                                                :type="$item->principal == 1 ? 'green' : ''" />
                                        </div>

                                        @if ($guia->codesunat != '0')
                                            <x-slot name="buttons">
                                                <x-button-delete onclick="confirmDeletevehiculo({{ $item }})"
                                                    wire:loading.attr="disabled" />
                                            </x-slot>
                                        @endif
                                    </x-minicard>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </x-form-card>
        @endif

        <x-form-card titulo="RESUMEN PRODUCTOS">
            <div class="w-full">
                @if (count($guia->tvitems) > 0)
                    <div class="flex gap-2 flex-wrap justify-start">
                        @foreach ($guia->tvitems as $item)
                            @php
                                $image = null;
                                $class = '';

                                if ($item->trashed()) {
                                    $class = 'bg-opacity-20 opacity-80 !shadow-red-400 bg-red-500 !cursor-default';
                                }
                                if ($item->cantidad == 0) {
                                    $class = 'bg-opacity-20 bg-neutral-400 !cursor-default';
                                }

                                if (count($item->producto->images)) {
                                    if (count($item->producto->defaultImage)) {
                                        $image = asset(
                                            'storage/productos/' . $item->producto->defaultImage->first()->url,
                                        );
                                    } else {
                                        $image = asset('storage/productos/' . $item->producto->images->first()->url);
                                    }
                                }
                            @endphp

                            <x-card-producto :name="$item->producto->name" :image="$image" :almacen="$item->almacen->name" :class="$class">
                                <div class="w-full mt-1 flex flex-wrap gap-1 items-start">
                                    <x-span-text :text="formatDecimalOrInteger($item->cantidad) .
                                        ' ' .
                                        $item->producto->unit->name" class="leading-3 !tracking-normal" />

                                    @if ($item->isNoAlterStock())
                                        <x-span-text text="NO ALTERA STOCK" class="leading-3 !tracking-normal" />
                                    @elseif ($item->isReservedStock())
                                        <x-span-text text="STOCK RESERVADO" class="leading-3 !tracking-normal"
                                            type="orange" />
                                    @elseif ($item->isIncrementStock())
                                        <x-span-text text="STOCK INCREMENTADO" class="leading-3 !tracking-normal"
                                            type="green" />
                                    @elseif($item->isDiscountStock())
                                        <x-span-text text="DISMINUYE STOCK" class="leading-3 !tracking-normal"
                                            type="red" />
                                    @endif

                                    @if (count($item->itemseries) == 1)
                                        <x-span-text :text="'SERIE :' . $item->itemseries()->first()->serie->serie" class="leading-3 !tracking-normal" />
                                    @endif
                                </div>

                                @if (!$item->trashed())
                                    @if ($item->cantidad > 0)
                                        @if ($item->isReservedStock())
                                            <x-button class="inline-block mt-1"
                                                onclick="confirmarSalida({{ $item->id }})"
                                                wire:loading.attr="disabled">CONFIRMAR SALIDA</x-button>
                                            <x-button class="inline-block mt-1"
                                                onclick="confirmarDevolucion({{ $item->id }})"
                                                wire:loading.attr="disabled">REPONER ALMACÉN</x-button>
                                        @endif

                                        @if ($item->isIncrementStock())
                                        @endif
                                    @endif
                                @endif

                                @if (count($item->itemseries) > 1)
                                    <div x-data="{ showForm: false }" class="mt-1">
                                        <x-button @click="showForm = !showForm" class="whitespace-nowrap"
                                            wire:loading.attr="disabled">
                                            {{ __('VER SERIES') }}</x-button>
                                        <div x-show="showForm" x-transition class="block w-full rounded mt-1">
                                            <div class="w-full flex flex-wrap gap-1">
                                                @foreach ($item->itemseries as $serie)
                                                    <x-span-text :text="$serie->serie->serie"
                                                        class="leading-3 !tracking-normal" />
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <x-slot name="footer">
                                    @if ($item->trashed())
                                        <x-span-text text="ELIMINADO" class="leading-3 !tracking-normal"
                                            type="red" />
                                    @else
                                        @if ($guia->codesunat != '0')
                                            <x-button-delete onclick="confirmDeleteitem({{ $item->id }})"
                                                wire:loading.attr="disabled" />
                                        @endif
                                    @endif
                                </x-slot>
                            </x-card-producto>
                        @endforeach
                    </div>
                @endif
            </div>
        </x-form-card>
    </div>

    <script>
        function confirmarSalida(tvitem_id) {
            swal.fire({
                title: 'Confirmar salida del producto seleccionado ?',
                text: "Se actualizará el stock del producto con la cantidad reservada en el item.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.confirmarsalida(tvitem_id);
                }
            })
        }

        function confirmarDevolucion(tvitem_id) {
            swal.fire({
                title: 'Confirmar devolución del producto seleccionado ?',
                text: "Se actualizará el stock del producto con la cantidad reservada en el item.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.confirmardevolucion(tvitem_id);
                }
            })
        }

        function confirmDeleteitem(tvitem_id) {
            swal.fire({
                title: 'Desea eliminar el producto seleccionado ?',
                text: "Se actualizará el stock del producto con la cantidad registrada en el item.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deleteitem(tvitem_id);
                }
            })
        }

        function confirmDeletevehiculo(vehiculo) {
            swal.fire({
                title: 'Eliminar vehículo de placa ' + vehiculo.placa,
                text: "Se eliminará un registro de la base de datos.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deletevehiculo(vehiculo.id);
                }
            })
        }

        function confirmDeletedriver(driver) {
            swal.fire({
                title: 'Eliminar conductor con nombres ' + driver.name + ' ' + driver.lastname,
                text: "Se eliminará un registro de la base de datos",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.deletedriver(driver.id);
                }
            })
        }
    </script>
</div>
