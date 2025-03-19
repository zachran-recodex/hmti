<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Departemen & Biro</flux:heading>

    </flux:card.header>

    <flux:card.body :padding="false">
        <div class="overflow-x-auto">
            <flux:table hover striped>
                <flux:table.columns>
                    <flux:table.column>Logo</flux:table.column>
                    <flux:table.column>Nama Departemen & Biro</flux:table.column>
                    <flux:table.column>Deskripsi</flux:table.column>
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
                Edit Departemen & Biro
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

                        {{-- Description --}}
                        <flux:textarea
                            label="Description"
                            wire:model="description"
                            rows="4"
                        />
                    </div>
                </flux:fieldset>

                <flux:fieldset>
                    <flux:heading size="lg" class="mb-4">Fungsi</flux:heading>

                    @foreach($fungsis as $index => $fungsi)
                        <div class="flex gap-4 items-start mb-4">
                            <div class="flex-1 space-y-4">
                                <flux:input label="Title" wire:model="fungsis.{{ $index }}.title" />
                                <flux:textarea label="Description" wire:model="fungsis.{{ $index }}.description" />
                            </div>
                            <flux:button type="button" variant="danger" wire:click="removeFungsi({{ $index }})" icon="trash" />
                        </div>
                    @endforeach

                    <div class="flex gap-4 items-start mb-4">
                        <div class="flex-1 space-y-4">
                            <flux:input label="New Fungsi Title" wire:model="newFungsi.title" />
                            <flux:textarea label="New Fungsi Description" wire:model="newFungsi.description" />
                        </div>
                        <flux:button type="button" variant="success" wire:click="addFungsi" icon="plus" />
                    </div>
                </flux:fieldset>

                <flux:fieldset>
                    <flux:heading size="lg" class="mb-4">Program Kerja</flux:heading>

                    @foreach($programKerjas as $index => $programKerja)
                        <div class="flex gap-4 items-start mb-4">
                            <div class="flex-1 space-y-4">
                                <flux:input label="Title" wire:model="programKerjas.{{ $index }}.title" />
                                <flux:textarea label="Description" wire:model="programKerjas.{{ $index }}.description" />
                            </div>
                            <flux:button type="button" variant="danger" wire:click="removeProgramKerja({{ $index }})" icon="trash" />
                        </div>
                    @endforeach

                    <div class="flex gap-4 items-start mb-4">
                        <div class="flex-1 space-y-4">
                            <flux:input label="New Program Kerja Title" wire:model="newProgramKerja.title" />
                            <flux:textarea label="New Program Kerja Description" wire:model="newProgramKerja.description" />
                        </div>
                        <flux:button type="button" variant="success" wire:click="addProgramKerja" icon="plus" />
                    </div>
                </flux:fieldset>

                <flux:fieldset>
                    <flux:heading size="lg" class="mb-4">Agenda</flux:heading>

                    @foreach($agendas as $index => $agenda)
                        <div class="flex gap-4 items-start mb-4">
                            <div class="flex-1 space-y-4">
                                <flux:input label="Title" wire:model="agendas.{{ $index }}.title" />
                                <flux:textarea label="Description" wire:model="agendas.{{ $index }}.description" />
                            </div>
                            <flux:button type="button" variant="danger" wire:click="removeAgenda({{ $index }})" icon="trash" />
                        </div>
                    @endforeach

                    <div class="flex gap-4 items-start mb-4">
                        <div class="flex-1 space-y-4">
                            <flux:input label="New Agenda Title" wire:model="newAgenda.title" />
                            <flux:textarea label="New Agenda Description" wire:model="newAgenda.description" />
                        </div>
                        <flux:button type="button" variant="success" wire:click="addAgenda" icon="plus" />
                    </div>
                </flux:fieldset>

                <flux:fieldset>
                    <flux:heading size="lg" class="mb-4">Members</flux:heading>

                    @foreach($members as $index => $member)
                        <div class="flex gap-4 items-start mb-4">
                            <div class="flex-1 space-y-4">
                                <flux:input label="Name" wire:model="members.{{ $index }}.name" />
                                <flux:select label="Position" wire:model="members.{{ $index }}.position">
                                    <option value="">Select Position</option>
                                    @foreach(\App\Models\Member::getPositions() as $position)
                                        <option value="{{ $position }}">{{ $position }}</option>
                                    @endforeach
                                </flux:select>
                            </div>
                            <flux:button type="button" variant="danger" wire:click="removeMember({{ $index }})" icon="trash" />
                        </div>
                    @endforeach

                    <div class="flex gap-4 items-start mb-4">
                        <div class="flex-1 space-y-4">
                            <flux:input label="New Member Name" wire:model="newMember.name" />
                            <flux:select label="New Member Position" wire:model="newMember.position">
                                <option value="">Select Position</option>
                                @foreach(\App\Models\Member::getPositions() as $position)
                                    <option value="{{ $position }}">{{ $position }}</option>
                                @endforeach
                            </flux:select>
                        </div>
                        <flux:button type="button" variant="success" wire:click="addMember" icon="plus" />
                    </div>
                </flux:fieldset>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary" class="w-fit">
                        Update
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
