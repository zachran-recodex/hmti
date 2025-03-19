<div>
    <flux:card class="w-full" x-data="{ selectedTab: 'hrd' }" wire:key="manage-internal-card">

        <flux:card.header x-on:keydown.right.prevent="$focus.wrap().next()" x-on:keydown.left.prevent="$focus.wrap().previous()" class="flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700" role="tablist" aria-label="tab options">
            <button x-on:click="selectedTab = 'hrd'" x-bind:aria-selected="selectedTab === 'hrd'" x-bind:tabindex="selectedTab === 'hrd' ? '0' : '-1'" x-bind:class="selectedTab === 'hrd' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelHumanResource" >Human Resource</button>
        </flux:card.header>

        <flux:card.body>
            <div x-cloak x-show="selectedTab === 'hrd'" id="tabpanelHumanResource" role="tabpanel" aria-label="hrd" wire:key="hrd-panel">
                <form wire:submit.prevent="updateHrd" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">

                            {{-- Logo --}}
                            <flux:field>
                                <flux:label>Logo</flux:label>
                                @if($logo)
                                    <img src="{{ $logo->temporaryUrl() }}" alt="Logo Preview" class="w-32 h-32 object-contain mb-4">
                                @elseif($hrd->logo)
                                    <img src="{{ Storage::url($hrd->logo) }}" alt="Current Logo" class="w-32 h-32 object-contain mb-4">
                                @endif
                                <flux:input type="file" wire:model="logo" accept="image/*" />
                                <flux:error name="logo" />
                            </flux:field>

                            {{-- Description --}}
                            <flux:textarea label="Description" wire:model="description" rows="3" />

                            {{-- Fungsi Section --}}
                            <div>
                                <label class="block text-sm font-medium mb-2">Fungsi</label>
                                <div class="space-y-2">
                                    @foreach($fungsis as $index => $fungsi)
                                        <div class="flex gap-2">
                                            <flux:input wire:model="fungsis.{{ $index }}.title" placeholder="Title" />
                                            <flux:textarea wire:model="fungsis.{{ $index }}.description" placeholder="Description" />
                                            <flux:button icon="trash" type="button" variant="danger" wire:click="removeFungsi({{ $index }})">Remove</flux:button>
                                        </div>
                                    @endforeach
                                    <flux:button icon="plus" type="button" variant="primary" wire:click="addFungsi">Add Fungsi</flux:button>
                                </div>
                            </div>

                            {{-- Program Kerja Section --}}
                            <div>
                                <label class="block text-sm font-medium mb-2">Program Kerja</label>
                                <div class="space-y-2">
                                    @foreach($program_kerjas as $index => $program)
                                        <div class="flex gap-2">
                                            <flux:input wire:model="program_kerjas.{{ $index }}.title" placeholder="Title" />
                                            <flux:textarea wire:model="program_kerjas.{{ $index }}.description" placeholder="Description" />
                                            <flux:button icon="trash" type="button" variant="danger" wire:click="removeProgramKerja({{ $index }})">Remove</flux:button>
                                        </div>
                                    @endforeach
                                    <flux:button icon="plus" type="button" variant="primary" wire:click="addProgramKerja">Add Program Kerja</flux:button>
                                </div>
                            </div>

                            {{-- Agenda Section --}}
                            <div>
                                <label class="block text-sm font-medium mb-2">Agenda</label>
                                <div class="space-y-2">
                                    @foreach($agendas as $index => $agenda)
                                        <div class="flex gap-2">
                                            <flux:input wire:model="agendas.{{ $index }}.title" placeholder="Title" />
                                            <flux:textarea wire:model="agendas.{{ $index }}.description" placeholder="Description" />
                                            <flux:button icon="trash" type="button" variant="danger" wire:click="removeAgenda({{ $index }})">Remove</flux:button>
                                        </div>
                                    @endforeach
                                    <flux:button icon="plus" type="button" variant="primary" wire:click="addAgenda">Add Agenda</flux:button>
                                </div>
                            </div>
                        </div>
                    </flux:fieldset>

                    <div class="flex justify-end">
                        {{-- Submit Button --}}
                        <flux:button type="submit" variant="primary" class="cursor-pointer w-fit">Update</flux:button>
                    </div>
                </form>
            </div>
        </flux:card.body>

    </flux:card>
</div>