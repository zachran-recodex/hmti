{{-- Komponen utama untuk manajemen role menggunakan Flux UI --}}
<flux:card>
    {{-- Header kartu dengan judul dan fitur pencarian --}}
    <flux:card.header class="flex justify-between items-center">
        {{-- Input pencarian dengan debounce 300ms untuk mengurangi request --}}
        <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search roles..." />

        {{-- Tombol untuk membuka modal form tambah role --}}
        <flux:modal.trigger name="form">
            <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                Add New
            </flux:button>
        </flux:modal.trigger>
    </flux:card.header>

    {{-- Badan kartu berisi tabel data role --}}
    <flux:card.body :padding="false">
        <div class="overflow-x-auto">
            {{-- Tabel dengan fitur hover dan striped --}}
            <flux:table hover striped>
                {{-- Definisi kolom tabel --}}
                <flux:table.columns>
                    <flux:table.column>Name</flux:table.column>
                    <flux:table.column>Actions</flux:table.column>
                </flux:table.columns>

                {{-- Baris-baris data role --}}
                <flux:table.rows>
                    @forelse ($roles as $role)
                        <flux:table.row>
                            {{-- Kolom nama role --}}
                            <flux:table.cell>
                                {{ $role->name }}
                            </flux:table.cell>

                            {{-- Kolom aksi (edit dan hapus) --}}
                            <flux:table.cell>
                                {{-- Tombol edit role --}}
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $role->id }})"
                                        icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                {{-- Tombol hapus role --}}
                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $role->id }})"
                                        icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        {{-- Tampilan ketika tidak ada data role --}}
                        <flux:table.row>
                            <flux:table.cell colspan="2" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.users class="size-12 mb-2" />
                                    <flux:heading size="lg">No roles found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new role.
                                    </flux:subheading>
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </flux:card.body>

    {{-- Footer kartu dengan pagination --}}
    <flux:card.footer>
        {{ $roles->links() }}
    </flux:card.footer>

    {{-- Modal form untuk tambah/edit role --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            {{-- Judul modal dinamis berdasarkan mode (edit/tambah) --}}
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Role' : 'Add New Role' }}
            </flux:heading>

            {{-- Form input data role --}}
            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Input nama role --}}
                        <flux:input
                            label="Name"
                            wire:model="name"
                            :disabled="in_array($name, ['admin', 'super-admin'])"
                        />

                        {{-- Input permissions --}}
                        <div>
                            <flux:label>Permissions</flux:label>
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($permissions as $permission)
                                    <flux:checkbox
                                        wire:model="selectedPermissions"
                                        :value="$permission->id"
                                        :label="$permission->name"
                                    />
                                @endforeach
                            </div>
                        </div>
                    </div>
                </flux:fieldset>

                {{-- Tombol submit form --}}
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary" class="w-fit">
                        {{ $isEditing ? 'Update' : 'Create' }}
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

    {{-- Modal konfirmasi hapus role --}}
    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete role?</flux:heading>
                {{-- Pesan konfirmasi penghapusan --}}
                <flux:subheading>
                    <p>Are you sure you want to delete this role?</p>
                    <p>This action cannot be undone.</p>
                </flux:subheading>
            </div>

            {{-- Tombol konfirmasi hapus --}}
            <div class="flex gap-2">
                <flux:spacer />
                <flux:button variant="danger" wire:click="delete">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</flux:card>