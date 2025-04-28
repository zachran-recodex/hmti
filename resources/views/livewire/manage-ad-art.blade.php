<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">AD/ART</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">AD/ART</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <flux:card>
        <flux:card.body>
            <div class="space-y-6">
                <form wire:submit.prevent="save" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-2">
                            <flux:input
                                type="file"
                                label="AD/ART Dokumen (PDF)"
                                wire:model="temp_file"
                                accept="application/pdf"
                            />

                            @if ($file_path)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">Current file:
                                        <a href="{{ Storage::url($file_path) }}"
                                           target="_blank"
                                           class="text-blue-600 hover:text-blue-800">
                                            Lihat PDF
                                        </a>
                                    </p>
                                </div>
                            @endif
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $adArtId ? 'Update' : 'Simpan' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>
