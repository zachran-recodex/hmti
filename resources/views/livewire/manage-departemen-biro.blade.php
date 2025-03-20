<flux:card>
    <flux:card.header class="flex justify-between items-center">
        <flux:heading size="lg" class="font-semibold">List Departemen & Biro</flux:heading>

    </flux:card.header>

    <flux:card.body :padding="false">
        <div class="overflow-x-auto">
            <flux:table hover striped>
                <flux:table.columns>
                    <flux:table.column>Logo</flux:table.column>
                    <flux:table.column>Nama Departemen / Biro</flux:table.column>
                    <flux:table.column>Deskripsi</flux:table.column>
                    <flux:table.column>Aksi</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @foreach ($departemenBiros as $departemenBiro)
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
                    @endforeach
                </flux:table.rows>
            </flux:table>
        </div>
    </flux:card.body>

    {{-- Form Modal --}}
    <flux:modal wire:model="showFormModal" title="form" class="min-w-5xl">
        <div class="space-y-6">
            <flux:heading size="lg" class="font-semibold mb-6">
                Edit {{ $title }}
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
                            label="Deskripsi"
                            wire:model="description"
                            rows="4"
                        />
                    </div>
                </flux:fieldset>

                <div x-data="{ selectedTab: 'fungsi' }" class="w-full border border-zinc-200 dark:border-zinc-700 rounded-lg">
                    <div x-on:keydown.right.prevent="$focus.wrap().next()" x-on:keydown.left.prevent="$focus.wrap().previous()" class="px-6 pt-2 flex gap-2 overflow-x-auto border-b border-neutral-300 dark:border-neutral-700" role="tablist" aria-label="tab options">
                        <button x-on:click="selectedTab = 'fungsi'" x-bind:aria-selected="selectedTab === 'fungsi'" x-bind:tabindex="selectedTab === 'fungsi' ? '0' : '-1'" x-bind:class="selectedTab === 'fungsi' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelFungsi" >Fungsi</button>
                        <button x-on:click="selectedTab = 'program-kerja'" x-bind:aria-selected="selectedTab === 'program-kerja'" x-bind:tabindex="selectedTab === 'program-kerja' ? '0' : '-1'" x-bind:class="selectedTab === 'program-kerja' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelProgramKerja" >Program Kerja</button>
                        <button x-on:click="selectedTab = 'agenda'" x-bind:aria-selected="selectedTab === 'agenda'" x-bind:tabindex="selectedTab === 'agenda' ? '0' : '-1'" x-bind:class="selectedTab === 'agenda' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelAgenda" >Agenda</button>
                        <button x-on:click="selectedTab = 'member'" x-bind:aria-selected="selectedTab === 'member'" x-bind:tabindex="selectedTab === 'member' ? '0' : '-1'" x-bind:class="selectedTab === 'member' ? 'font-bold text-black border-b-2 border-black dark:border-white dark:text-white' : 'text-neutral-600 font-medium dark:text-neutral-300 dark:hover:border-b-neutral-300 dark:hover:text-white hover:border-b-2 hover:border-b-neutral-800 hover:text-neutral-900'" class="h-min px-4 py-2 text-sm" type="button" role="tab" aria-controls="tabpanelMember" >Member</button>
                    </div>
                    <div class="p-6 text-neutral-600 dark:text-neutral-300">
                        <div x-cloak x-show="selectedTab === 'fungsi'" id="tabpanelFungsi" role="tabpanel" aria-label="fungsi">

                            {{-- Fungsi --}}
                            <flux:fieldset>

                                @foreach($fungsis as $index => $fungsi)
                                    <div class="flex gap-4 items-start mb-4">
                                        <div class="flex-1 space-y-4">
                                            <flux:input label="Judul" wire:model="fungsis.{{ $index }}.title" />
                                        </div>
                                    </div>
                                    <flux:button type="button" variant="danger" wire:click="removeFungsi({{ $index }})" icon="trash" class="w-full mb-4">Hapus</flux:button>
                                @endforeach

                                <div class="flex gap-4 items-start mb-4">
                                    <div class="flex-1 space-y-4">
                                        <flux:input label="Judul Fungsi Baru" wire:model="newFungsi.title" />
                                    </div>
                                </div>
                                <flux:button type="button" variant="success" wire:click="addFungsi" icon="plus" class="w-full">Tambah</flux:button>
                            </flux:fieldset>

                        </div>
                        <div x-cloak x-show="selectedTab === 'program-kerja'" id="tabpanelProgramKerja" role="tabpanel" aria-label="program-kerja">

                            {{-- Program Kerja --}}
                            <flux:fieldset>

                                @foreach($programKerjas as $index => $programKerja)
                                    <div class="flex gap-4 items-start mb-4">
                                        <div class="flex-1 space-y-4">
                                            <flux:input label="Judul" wire:model="programKerjas.{{ $index }}.title" />
                                            <flux:textarea label="Deskripsi" wire:model="programKerjas.{{ $index }}.description" />
                                        </div>
                                    </div>
                                    <flux:button type="button" variant="danger" wire:click="removeProgramKerja({{ $index }})" icon="trash" class="w-full mb-4">Hapus</flux:button>
                                @endforeach

                                <div class="flex gap-4 items-start mb-4">
                                    <div class="flex-1 space-y-4">
                                        <flux:input label="Judul Program Kerja Baru" wire:model="newProgramKerja.title" />
                                        <flux:textarea label="Deskripsi Program Kerja Baru" wire:model="newProgramKerja.description" />
                                    </div>
                                </div>
                                <flux:button type="button" variant="success" wire:click="addProgramKerja" icon="plus" class="w-full">Tambah</flux:button>
                            </flux:fieldset>

                        </div>
                        <div x-cloak x-show="selectedTab === 'agenda'" id="tabpanelAgenda" role="tabpanel" aria-label="agenda">

                            {{-- Agenda --}}
                            <flux:fieldset>

                                @foreach($agendas as $index => $agenda)
                                    <div class="flex gap-4 items-start mb-4">
                                        <div class="flex-1 space-y-4">
                                            <flux:input label="Judul" wire:model="agendas.{{ $index }}.title" />
                                            <flux:textarea label="Deskripsi" wire:model="agendas.{{ $index }}.description" />
                                        </div>
                                    </div>
                                    <flux:button type="button" variant="danger" wire:click="removeAgenda({{ $index }})" icon="trash" class="w-full mb-4">Hapus</flux:button>
                                @endforeach

                                <div class="flex gap-4 items-start mb-4">
                                    <div class="flex-1 space-y-4">
                                        <flux:input label="Judul Agenda Baru" wire:model="newAgenda.title" />
                                        <flux:textarea label="Deskripsi Agenda Baru" wire:model="newAgenda.description" />
                                    </div>
                                </div>
                                <flux:button type="button" variant="success" wire:click="addAgenda" icon="plus" class="w-full">Tambah</flux:button>
                            </flux:fieldset>

                        </div>
                        <div x-cloak x-show="selectedTab === 'member'" id="tabpanelMember" role="tabpanel" aria-label="member">

                            {{-- Member --}}
                            <flux:fieldset>

                                @foreach($members as $index => $member)
                                    <div class="flex gap-4 items-start mb-4">
                                        <div class="flex-1 space-y-4">
                                            <flux:input label="Nama" wire:model="members.{{ $index }}.name" />
                                            <flux:select label="Jabatan" wire:model="members.{{ $index }}.position">
                                                <option value="">Pilih Jabatan</option>
                                                @foreach(\App\Models\Member::getPositions() as $position)
                                                    <option value="{{ $position }}">{{ $position }}</option>
                                                @endforeach
                                            </flux:select>
                                        </div>
                                    </div>
                                    <flux:button type="button" variant="danger" wire:click="removeMember({{ $index }})" icon="trash" class="w-full mb-4">Hapus</flux:button>
                                @endforeach

                                <div class="flex gap-4 items-start mb-4">
                                    <div class="flex-1 space-y-4">
                                        <flux:input label="Nama Member Baru" wire:model="newMember.name" />
                                        <flux:select label="Jabatan Member Baru" wire:model="newMember.position">
                                            <option value="">Pilih Jabatan</option>
                                            @foreach(\App\Models\Member::getPositions() as $position)
                                                <option value="{{ $position }}">{{ $position }}</option>
                                            @endforeach
                                        </flux:select>
                                    </div>
                                </div>
                                <flux:button type="button" variant="success" wire:click="addMember" icon="plus" class="w-full">Tambah</flux:button>
                            </flux:fieldset>

                        </div>
                    </div>
                </div>

                <div class="flex">
                    <flux:spacer />

                    <flux:button type="submit" variant="primary" class="w-fit">
                        Update
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</flux:card>
