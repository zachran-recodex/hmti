<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Manage Core Team</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Manage Core Team</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:input class="w-64!" icon="magnifying-glass" wire:model.live.debounce.300ms="searchTerm" placeholder="Search core team..." />

            <flux:modal.trigger name="form">
                <flux:button type="button" variant="primary" class="w-fit" icon="plus">
                    Add New
                </flux:button>
            </flux:modal.trigger>
        </flux:card.header>

        <flux:card.body :padding="false">
            <div class="overflow-x-auto">
                <flux:table hover striped>
                    <flux:table.columns>
                        <flux:table.column>Photo</flux:table.column>
                        <flux:table.column sortable wire:click="sortBy('name')" :direction="$sortField === 'name' ? $sortDirection : null">
                            Name
                        </flux:table.column>
                        <flux:table.column sortable wire:click="sortBy('position')" :direction="$sortField === 'position' ? $sortDirection : null">
                            Position
                        </flux:table.column>
                        <flux:table.column>Actions</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($intis as $inti)
                            <flux:table.row>
                                <flux:table.cell>
                                    <img src="{{ Storage::url($inti->photo) }}" alt="{{ $inti->name }}" class="w-16 h-16 object-cover rounded-full">
                                </flux:table.cell>
                                <flux:table.cell>
                                    {{ $inti->name }}
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="blue">
                                        {{ $inti->position }}
                                    </flux:badge>
                                </flux:table.cell>
                                <flux:table.cell>
                                    <flux:modal.trigger name="form">
                                        <flux:button variant="warning" wire:click="edit({{ $inti->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger name="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $inti->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </flux:table.cell>
                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="4" class="text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <flux:icon.users class="size-12 mb-2" />
                                        <flux:heading size="lg">No core team members found</flux:heading>
                                        <flux:subheading>
                                            Start by creating a new core team member.
                                        </flux:subheading>
                                    </div>
                                </flux:table.cell>
                            </flux:table.row>
                        @endforelse
                    </flux:table.rows>
                </flux:table>
            </div>
        </flux:card.body>

        <flux:card.footer>
            {{ $intis->links() }}
        </flux:card.footer>

        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $isEditing ? 'Edit Core Team Member' : 'Add New Core Team Member' }}
                </flux:heading>

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            <flux:input label="Name" wire:model="name" />

                            <div>
                                <flux:label>Position</flux:label>
                                <flux:select wire:model="position">
                                    <option value="">Select Position</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position }}">{{ $position }}</option>
                                    @endforeach
                                </flux:select>
                            </div>

                            <div>
                                <flux:label>Photo</flux:label>
                                <flux:input type="file" wire:model="tempPhoto" accept="image/*" />
                                @if ($tempPhoto)
                                    <img src="{{ $tempPhoto->temporaryUrl() }}" class="mt-2 w-32 h-32 object-cover rounded">
                                @elseif ($photo && $isEditing)
                                    <img src="{{ Storage::url($photo) }}" class="mt-2 w-32 h-32 object-cover rounded">
                                @endif
                            </div>
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $isEditing ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        <flux:modal name="delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete core team member?</flux:heading>
                    <flux:subheading>
                        <p>Are you sure you want to delete this core team member?</p>
                        <p>This action cannot be undone.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />
                    <flux:button variant="danger" wire:click="delete">Delete</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:card>
</flux:container>