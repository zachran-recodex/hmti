{{-- Komponen utama untuk manajemen permission menggunakan Flux UI --}}
<flux:card>
    {{-- Header kartu dengan judul dan fitur pencarian --}}
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Permission</flux:heading>

        {{-- Bagian kanan header dengan pencarian dan tombol tambah --}}
        <div class="flex items-center gap-4">
            {{-- Input pencarian dengan debounce 300ms untuk mengurangi request --}}
            <flux:input icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search permissions..." />

            {{-- Tombol untuk membuka modal form tambah permission --}}
            <flux:modal.trigger name="form">
                <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                    Add New
                </flux:button>
            </flux:modal.trigger>
        </div>
    </flux:card.header>

    {{-- Badan kartu berisi tabel data permission --}}
    <flux:card.body :padding="false">
        <div class="overflow-x-auto">
            {{-- Tabel dengan fitur hover dan striped --}}
            <flux:table hover striped>
                {{-- Definisi kolom tabel --}}
                <flux:table.columns>
                    <flux:table.column>Name</flux:table.column>
                    <flux:table.column>Actions</flux:table.column>
                </flux:table.columns>

                {{-- Baris-baris data permission --}}
                <flux:table.rows>
                    @forelse ($permissions as $permission)
                        <flux:table.row>
                            {{-- Kolom nama permission --}}
                            <flux:table.cell>
                                {{ $permission->name }}
                            </flux:table.cell>

                            {{-- Kolom aksi (edit dan hapus) --}}
                            <flux:table.cell>
                                {{-- Tombol edit permission --}}
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $permission->id }})"
                                        icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                {{-- Tombol hapus permission --}}
                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $permission->id }})"
                                        icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        {{-- Tampilan ketika tidak ada data permission --}}
                        <flux:table.row>
                            <flux:table.cell colspan="2" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.users class="size-12 mb-2" />
                                    <flux:heading size="lg">No permissions found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new permission.
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
        {{ $permissions->links() }}
    </flux:card.footer>

    {{-- Modal form untuk tambah/edit permission --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">
            {{-- Judul modal dinamis berdasarkan mode (edit/tambah) --}}
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Permission' : 'Add New Permission' }}
            </flux:heading>

            {{-- Form input data permission --}}
            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">
                        {{-- Input nama permission --}}
                        <flux:input label="Name" wire:model="name" />
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

    {{-- Modal konfirmasi hapus permission --}}
    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete permission?</flux:heading>
                {{-- Pesan konfirmasi penghapusan --}}
                <flux:subheading>
                    <p>Are you sure you want to delete this permission?</p>
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