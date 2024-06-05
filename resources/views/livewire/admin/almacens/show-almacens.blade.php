<div>
    @if (count($almacens) > 0)
        <div class="w-full flex flex-wrap gap-2">
            @foreach ($almacens as $item)
                <x-minicard :title="null" size="lg"
                    alignFooter="{{ $item->default == '1' ? 'justify-between' : 'justify-end' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 inline-block mx-auto" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M13 22C12.1818 22 11.4002 21.6588 9.83691 20.9764C8.01233 20.18 6.61554 19.5703 5.64648 19H2M13 22C13.8182 22 14.5998 21.6588 16.1631 20.9764C20.0544 19.2779 22 18.4286 22 17V6.5M13 22L13 11M4 6.5L4 9.5" />
                        <path
                            d="M9.32592 9.69138L6.40472 8.27785C4.80157 7.5021 4 7.11423 4 6.5C4 5.88577 4.80157 5.4979 6.40472 4.72215L9.32592 3.30862C11.1288 2.43621 12.0303 2 13 2C13.9697 2 14.8712 2.4362 16.6741 3.30862L19.5953 4.72215C21.1984 5.4979 22 5.88577 22 6.5C22 7.11423 21.1984 7.5021 19.5953 8.27785L16.6741 9.69138C14.8712 10.5638 13.9697 11 13 11C12.0303 11 11.1288 10.5638 9.32592 9.69138Z" />
                        <path d="M18.1366 4.01563L7.86719 8.98485" />
                        <path d="M2 13H5" />
                        <path d="M2 16H5" />
                    </svg>

                    <span class="text-[10px] text-center font-semibold">{{ $item->name }}</span>

                    <x-slot name="buttons">
                        @if ($item->default)
                            <x-icon-default />
                        @endif
                        <div class="flex gap-2">
                            @can('admin.almacen.edit')
                                <x-button-edit wire:click="edit({{ $item->id }})" wire:loading.attr="disabled"
                                    wire:key="editalmacen_{{ $item->id }}" />
                            @endcan

                            @can('admin.almacen.delete')
                                <x-button-delete onclick="confirmDelete({{ $item }})" wire:loading.attr="disabled"
                                    wire:key="deletealmacen_{{ $item->id }}" />
                            @endcan
                        </div>
                    </x-slot>
                </x-minicard>
            @endforeach
        </div>
    @endif

    <x-jet-dialog-modal wire:model="open" maxWidth="3xl" footerAlign="justify-end">
        <x-slot name="title">
            {{ __('Actualizar almacén') }}
            <x-button-close-modal wire:click="$toggle('open')" wire:loading.attr="disabled" />
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update" class="relative">
                <div class="w-full">
                    <x-label value="Nombre :" />
                    <x-input class="block w-full" wire:model.defer="almacen.name" placeholder="Nombre de almacén..." />
                    <x-jet-input-error for="almacen.name" />
                </div>

                <div class="w-full mt-2">
                    <x-label-check for="edit_default">
                        <x-input wire:model.defer="almacen.default" name="default" value="1" type="checkbox"
                            id="edit_default" />
                        SELECCIONAR COMO PREDETERMINADO
                    </x-label-check>
                    <x-jet-input-error for="almacen.default" />
                </div>

                <div class="w-full flex pt-4 justify-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        {{ __('ACTUALIZAR') }}
                    </x-button>
                </div>

                <div wire:loading.flex class="loading-overlay rounded hidden">
                    <x-loading-next />
                </div>
            </form>
        </x-slot>
    </x-jet-dialog-modal>

    <script>
        function confirmDelete(almacen) {
            swal.fire({
                title: 'Eliminar registro de ' + almacen.name + ' ?',
                text: "Almacén seleccionado dejará de estar disponible, además se eliminará el stock disponible de los productos vinculados.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(almacen.id);
                }
            })
        }
    </script>
</div>
