<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Departemen & Biro</flux:heading>

        <flux:modal.trigger title="form">
            <flux:button type="button" variant="primary" class="w-fit" wire:click="create" icon="plus">
                Add New
            </flux:button>
        </flux:modal.trigger>
    </flux:card.header>

    <flux:card.body :padding="false">
        <div class="overflow-x-auto">
            <flux:table hover striped>
                <flux:table.columns>
                    <flux:table.column>Logo</flux:table.column>
                    <flux:table.column>Title</flux:table.column>
                    <flux:table.column>Description</flux:table.column>
                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($departemenBiros as $departemenBiro)
                        <flux:table.row>
                            <flux:table.cell>
                                <img src="{{ $departemenBiro->logo ? Storage::url($departemenBiro->logo) : asset('images/placeholder.png') }}"
                                    alt="{{ $departemenBiro->title }}" class="h-auto w-12">
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $departemenBiro->title }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $departemenBiro->description }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <div class="flex gap-2">
                                    <flux:modal.trigger title="form">
                                        <flux:button variant="warning" wire:click="edit({{ $departemenBiro->id }})"
                                            icon="pencil"></flux:button>
                                    </flux:modal.trigger>

                                    <flux:modal.trigger title="delete">
                                        <flux:button variant="danger" wire:click="confirmDelete({{ $departemenBiro->id }})"
                                            icon="trash"></flux:button>
                                    </flux:modal.trigger>
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="6" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.users class="size-12 mb-2" />
                                    <flux:heading size="lg">No Departemen & Biro found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new Departemen & Biro.
                                    </flux:subheading>
                                </div>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </div>
    </flux:card.body>

    {{-- Form Modal --}}
    <flux:modal wire:model="showFormModal" title="form" class="w-7xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Departemen & Biro' : 'Add New Departemen & Biro' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">

                        {{-- Logo --}}
                        <flux:field>
                            <flux:label>Logo</flux:label>
                            <flux:input type="file" wire:model="temp_logo" accept="image/*" />
                            <flux:error title="temp_logo" />

                            {{-- Logo Preview --}}
                            <div class="mt-2">
                                @if ($temp_logo)
                                    <img src="{{ $logoPreview }}" alt="Preview"
                                        class="h-auto w-32">
                                @elseif ($isEditing && $logo)
                                    <img src="{{ Storage::url($logo) }}" alt="Current Logo"
                                        class="h-auto w-32">
                                @endif
                            </div>
                        </flux:field>

                        {{-- Title --}}
                        <flux:input label="Title" wire:model="title" />

                        {{-- Description --}}
                        <flux:textarea
                            label="Description"
                            wire:model="description"
                            rows="4"
                        />
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

    {{-- Delete Modal --}}
    <flux:modal wire:model="showDeleteModal" title="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete Departemen & Biro?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this Departemen &Biro?</p>
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
