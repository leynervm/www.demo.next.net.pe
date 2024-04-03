<div class="">
    @if ($roles->hasPages())
        <div class="w-full pb-2">
            {{ $roles->onEachSide(0)->links('livewire::pagination-default') }}
        </div>
    @endif

    <div class="flex gap-2 flex-wrap justify-start">
        @if (count($roles) > 0)
            @foreach ($roles as $item)
                <x-minicard :title="null" size="lg">
                    <div class="text-center">
                        <x-span-text :text="$item->name" class="leading-3 !tracking-normal" />
                    </div>

                    <div class="text-center inline-block">

                        @cannot('admin.roles.edit')
                            <h1 class="inline-block text-center text-[10px] text-linktable p-1 rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    class="mx-auto w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M18.5002 11.4996C18.2252 10.4746 16.9752 8.99609 15.0752 9.09963C15.0752 9.09963 13.1434 8.99609 11.1909 8.99609C9.23839 8.99609 8.25019 9.02463 6.72519 9.09963C5.70019 9.09963 4.07519 9.67463 3.45019 11.4246C2.87446 13.1751 2.89974 16.7991 3.2502 18.6496C3.32529 19.5999 3.84822 20.9494 5.4002 21.6496C6.1502 22.0996 10.8502 21.9496 11.5002 21.9996" />
                                    <path
                                        d="M6.51635 8.19624C6.46629 5.82059 6.36616 3.94508 9.11967 2.39466C10.0458 2.01956 11.4226 1.69447 13.1248 2.49469C14.902 3.56998 15.1234 4.70796 15.2775 4.99537C15.7031 6.12068 15.4778 7.72111 15.5278 8.37129" />
                                    <path
                                        d="M15.6702 18.444C15.9702 18.588 16.3422 18.96 16.5222 19.26C16.5822 19.68 16.8822 18.06 18.3462 17.1M21.0002 18C21.0002 20.2091 19.2094 22 17.0002 22C14.7911 22 13.0002 20.2091 13.0002 18C13.0002 15.7909 14.7911 14 17.0002 14C19.2094 14 21.0002 15.7909 21.0002 18Z" />
                                </svg>
                                <x-span-text :text="$item->permissions()->modulesActivePermission()->count()" class="leading-3 " type="green" />
                                PERMISOS
                            </h1>
                        @endcannot
                        @can('admin.roles.edit')
                            <a class="inline-block text-center text-[10px] text-linktable p-1 rounded hover:text-hoverlinktable duration-150"
                                href="{{ route('admin.roles.edit', $item->id) }}">

                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    class="mx-auto w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path
                                        d="M18.5002 11.4996C18.2252 10.4746 16.9752 8.99609 15.0752 9.09963C15.0752 9.09963 13.1434 8.99609 11.1909 8.99609C9.23839 8.99609 8.25019 9.02463 6.72519 9.09963C5.70019 9.09963 4.07519 9.67463 3.45019 11.4246C2.87446 13.1751 2.89974 16.7991 3.2502 18.6496C3.32529 19.5999 3.84822 20.9494 5.4002 21.6496C6.1502 22.0996 10.8502 21.9496 11.5002 21.9996" />
                                    <path
                                        d="M6.51635 8.19624C6.46629 5.82059 6.36616 3.94508 9.11967 2.39466C10.0458 2.01956 11.4226 1.69447 13.1248 2.49469C14.902 3.56998 15.1234 4.70796 15.2775 4.99537C15.7031 6.12068 15.4778 7.72111 15.5278 8.37129" />
                                    <path
                                        d="M15.6702 18.444C15.9702 18.588 16.3422 18.96 16.5222 19.26C16.5822 19.68 16.8822 18.06 18.3462 17.1M21.0002 18C21.0002 20.2091 19.2094 22 17.0002 22C14.7911 22 13.0002 20.2091 13.0002 18C13.0002 15.7909 14.7911 14 17.0002 14C19.2094 14 21.0002 15.7909 21.0002 18Z" />
                                </svg>
                                <x-span-text :text="$item->permissions()->modulesActivePermission()->count()" class="leading-3 " type="green" />
                                PERMISOS</a>
                        @endcan
                    </div>

                    @can('admin.roles.delete')
                        <x-slot name="buttons">
                            <x-button-delete wire:loading.attr="disabled" onclick="confirmDelete({{ $item }})" />
                        </x-slot>
                    @endcan
                </x-minicard>
            @endforeach
        @endif
    </div>

    <script>
        function confirmDelete(role) {
            swal.fire({
                title: 'Eliminar rol ' + role.name,
                text: "Se eliminará el rol de los usuarios vinculados y de la base de datos.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#0FB9B9',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.delete(role.id);
                }
            })
        }
    </script>
</div>
