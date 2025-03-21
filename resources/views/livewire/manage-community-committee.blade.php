<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Community & Committee</flux:heading>

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

                    <flux:table.column>Logo</flux:table.column>

                    <flux:table.column sortable wire:click="sortBy('category')" :direction="$sortField === 'category' ? $sortDirection : null">Category</flux:table.column>

                    <flux:table.column>Title</flux:table.column>

                    <flux:table.column>Description</flux:table.column>

                    <flux:table.column>Action</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse ($communityCommittees as $communityCommittee)
                        <flux:table.row>

                            <flux:table.cell>
                                <img src="{{ Storage::url($communityCommittee->logo) }}" alt="{{ $communityCommittee->title }}" class="h-auto w-12 object-cover rounded">
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $communityCommittee->category }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $communityCommittee->title }}
                            </flux:table.cell>

                            <flux:table.cell>
                                {{ $communityCommittee->description }}
                            </flux:table.cell>

                            <flux:table.cell>
                                <flux:modal.trigger name="form">
                                    <flux:button variant="warning" wire:click="edit({{ $communityCommittee->id }})" icon="pencil"></flux:button>
                                </flux:modal.trigger>

                                <flux:modal.trigger name="delete">
                                    <flux:button variant="danger" wire:click="confirmDelete({{ $communityCommittee->id }})" icon="trash"></flux:button>
                                </flux:modal.trigger>
                            </flux:table.cell>

                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="5" class="text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <flux:icon.wrench-screwdriver class="size-12 mb-2" />
                                    <flux:heading size="lg">No communityCommittees found</flux:heading>
                                    <flux:subheading>
                                        Start by creating a new communityCommittee.
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
        {{ $communityCommittees->links() }}
    </flux:card.footer>

    {{-- Form Modal --}}
    <flux:modal name="form" class="w-7xl">
        <div class="space-y-6">

            <flux:heading size="lg" class="font-semibold mb-6">
                {{ $isEditing ? 'Edit Community & Committee' : 'Add New Community & Committee' }}
            </flux:heading>

            <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                <flux:fieldset>
                    <div class="space-y-6">

                        {{-- Logo --}}
                        <flux:field>
                            <flux:label>Logo</flux:label>
                            <flux:input type="file" wire:model="temp_logo" accept="logo/*" />
                            <flux:error name="temp_logo" />

                            {{-- Logo Preview --}}
                            <div class="mt-2">
                                @if ($temp_logo)
                                    <img src="{{ $logoPreview }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                                @elseif ($isEditing && $logo)
                                    <img src="{{ Storage::url($logo) }}" alt="Current Logo" class="h-32 w-auto object-cover rounded">
                                @endif
                            </div>
                        </flux:field>

                        {{-- Category --}}
                        <flux:field>
                            <flux:label>Category</flux:label>
                            <flux:select wire:model="category">
                                <option value="">Select Category</option>
                                @foreach(\App\Models\CommunityCommittee::getCategories() as $categoryOption)
                                    <option value="{{ $categoryOption }}">{{ $categoryOption }}</option>
                                @endforeach
                            </flux:select>
                            <flux:error name="category" />
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
    <flux:modal name="delete" class="min-w-[22rem]">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Delete communityCommittee?</flux:heading>

                <flux:subheading>
                    <p>Are you sure you want to delete this communityCommittee?</p>
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
