<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Tentang Kami</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Tentang Kami</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.body>
            <div class="space-y-6">

                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            <flux:textarea
                                label="Definisi"
                                wire:model="definisi"
                                rows="4"
                            />

                            <flux:textarea
                                label="Kedudukan dan Peran"
                                wire:model="kedudukan_peran"
                                rows="4"
                            />

                            <flux:textarea
                                label="Visi"
                                wire:model="visi"
                                rows="4"
                            />

                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <flux:label>Misi</flux:label>
                                    <flux:button type="button" variant="primary" wire:click="addMission" icon="plus">
                                        Tambah Misi
                                    </flux:button>
                                </div>

                                @foreach($misi as $index => $point)
                                    <div class="flex gap-2">
                                        <flux:textarea
                                            wire:model="misi.{{ $index }}"
                                            rows="2"
                                        />
                                        <flux:button type="button" variant="danger" wire:click="removeMission({{ $index }})" icon="trash">
                                        </flux:button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="space-y-2">
                                <flux:input
                                    type="file"
                                    label="Struktural"
                                    wire:model="temp_gambar_stuktural"
                                    accept="image/*"
                                />

                                @if ($temp_gambar_stuktural)
                                    <img src="{{ $temp_gambar_stuktural->temporaryUrl() }}" class="mt-2 h-32 w-auto object-cover rounded-lg">
                                @elseif ($gambar_stuktural)
                                    <img src="{{ Storage::url($gambar_stuktural) }}" class="mt-2 h-32 w-auto object-cover rounded-lg">
                                @endif
                            </div>
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $tentangId ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>
