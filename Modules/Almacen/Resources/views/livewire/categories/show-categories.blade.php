<div class="relative">
    @if ($categories->hasPages())
        <div class="w-full pb-2">
            {{ $categories->onEachSide(0)->links('livewire::pagination-default') }}
        </div>
    @endif

    <div class="flex gap-2 flex-wrap justify-start">
        @if (count($categories))
            @foreach ($categories as $item)
                <div
                    class="w-full relative xs:w-60 flex flex-col justify-between gap-2 bg-fondominicard shadow shadow-shadowminicard p-1 rounded">
                    <h1 class="text-colortitleform text-[10px] font-semibold leading-3 text-justify lg:text-center mt-1">
                        {{ $item->name }}</h1>
                    @if (count($item->subcategories))
                        <div class="w-full flex flex-wrap gap-1">
                            @foreach ($item->subcategories as $subcategory)
                                <x-span-text :text="$subcategory->name" class="leading-3" />
                            @endforeach
                        </div>
                    @endif

                    <div class="w-full flex gap-1 pt-2 justify-end">
                        <x-button-edit wire:click="edit({{ $item->id }})" wire:loading.attr="disabled" />
                        <x-button-delete wire:click="$emit('subcategories.confirmDelete', {{ $item }})"
                            wire:loading.attr="disabled" />
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div wire:loading.flex class="loading-overlay rounded hidden">
        <x-loading-next />
    </div>

    <x-jet-dialog-modal wire:model="open" maxWidth="lg" footerAlign="justify-end">
        <x-slot name="title">
            {{ __('Actualizar categoría') }}
            <x-button-add wire:click="$toggle('open')" wire:loading.attr="disabled">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-full h-full" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6 6 18" />
                    <path d="m6 6 12 12" />
                </svg>
            </x-button-add>
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="update">
                <x-label value="Nombre :" />
                <x-input class="block w-full" wire:model.defer="category.name"
                    placeholder="Ingrese nombre categoría..." />
                <x-jet-input-error for="category.name" />

                <div class="w-full flex pt-4 justify-end">
                    <x-button type="submit" wire:loading.attr="disabled">
                        {{ __('Save') }}</x-button>
                </div>
            </form>
        </x-slot>
    </x-jet-dialog-modal>
    <script>
        document.addEventListener('livewire:load', function() {
            Livewire.on('subcategories.confirmDelete', data => {
                swal.fire({
                    title: 'Eliminar registro con nombre, ' + data.name,
                    text: "Se eliminará un registro de la base de datos",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#0FB9B9',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirmar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // console.log(data.detail.id);
                        Livewire.emitTo('almacen::categories.show-categories', 'delete', data.id);
                    }
                })
            })
        })
    </script>
</div>
