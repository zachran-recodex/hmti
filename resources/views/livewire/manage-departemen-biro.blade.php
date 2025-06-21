<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <flux:heading size="xl" class="font-bold!">Departemen & Biro</flux:heading>

        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('dashboard') }}" separator="slash">Dashboard</flux:breadcrumbs.item>
            <flux:breadcrumbs.item separator="slash">Departemen & Biro</flux:breadcrumbs.item>
        </flux:breadcrumbs>
    </div>

    <!-- Search and Filter Section -->
    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Filter & Pencarian</flux:heading>
        </flux:card.header>

        <flux:card.body>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search Input -->
                <div class="md:col-span-2">
                    <flux:input 
                        label="Pencarian" 
                        wire:model.live.debounce.300ms="search" 
                        placeholder="Cari berdasarkan nama atau deskripsi..."
                        icon="magnifying-glass"
                    />
                </div>

                <!-- Divisi Filter -->
                <div>
                    <flux:select label="Filter Divisi" wire:model.live="filterDivisi">
                        <option value="">Semua Divisi</option>
                        @foreach($divisiOptions as $option)
                            <option value="{{ $option }}">{{ $option }}</option>
                        @endforeach
                    </flux:select>
                </div>
            </div>

            <!-- Clear Filters -->
            @if($search || $filterDivisi)
                <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <flux:button variant="ghost" wire:click="clearFilters" icon="x-mark">
                        Hapus Filter
                    </flux:button>
                </div>
            @endif
        </flux:card.body>
    </flux:card>

    <flux:card>
        <flux:card.header class="flex justify-between items-center">
            <flux:heading size="lg" class="font-semibold">List Departemen & Biro</flux:heading>

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

                        <flux:table.column sortable wire:click="sortBy('nama')" :direction="$sortField === 'nama' ? $sortDirection : null">Nama</flux:table.column>

                        <flux:table.column sortable wire:click="sortBy('divisi')" :direction="$sortField === 'divisi' ? $sortDirection : null">Divisi</flux:table.column>

                        <flux:table.column>Statistik</flux:table.column>

                        <flux:table.column sortable wire:click="sortBy('created_at')" :direction="$sortField === 'created_at' ? $sortDirection : null">Dibuat</flux:table.column>

                        <flux:table.column>Action</flux:table.column>
                    </flux:table.columns>

                    <flux:table.rows>
                        @forelse ($departemenBiros as $departemenBiro)
                            <flux:table.row>

                                <flux:table.cell>
                                    @if($departemenBiro->logo)
                                        <img src="{{ Storage::url($departemenBiro->logo) }}" alt="{{ $departemenBiro->nama }}" class="h-auto w-12 object-cover rounded">
                                    @else
                                        <div class="h-12 w-12 bg-gray-300 dark:bg-gray-600 rounded flex items-center justify-center">
                                            <flux:icon.building-office class="h-6 w-6 text-gray-500 dark:text-gray-400" />
                                        </div>
                                    @endif
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div>
                                        <div class="font-medium">{{ $departemenBiro->nama }}</div>
                                        @if($departemenBiro->deskripsi)
                                            <div class="text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs">
                                                {{ Str::limit($departemenBiro->deskripsi, 50) }}
                                            </div>
                                        @endif
                                    </div>
                                </flux:table.cell>

                                <flux:table.cell>
                                    <flux:badge 
                                        size="sm"
                                        :color="$departemenBiro->divisi === 'Internal' ? 'blue' : ($departemenBiro->divisi === 'PSTI' ? 'green' : 'purple')"
                                    >
                                        {{ $departemenBiro->divisi }}
                                    </flux:badge>
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span title="Anggota">👥 {{ $departemenBiro->anggotas_count ?? 0 }}</span>
                                        <span title="Fungsi">⚙️ {{ $departemenBiro->fungsis_count ?? 0 }}</span>
                                        <span title="Program Kerja">📋 {{ $departemenBiro->program_kerjas_count ?? 0 }}</span>
                                        <span title="Agenda">📅 {{ $departemenBiro->agendas_count ?? 0 }}</span>
                                    </div>
                                </flux:table.cell>

                                <flux:table.cell>
                                    {{ $departemenBiro->created_at->format('d M Y') }}
                                </flux:table.cell>

                                <flux:table.cell>
                                    <div class="flex space-x-1">
                                        <flux:button variant="ghost" size="sm" wire:click="selectDepartemen({{ $departemenBiro->id }})" icon="eye" title="Lihat Detail"></flux:button>
                                        
                                        <flux:modal.trigger name="form">
                                            <flux:button variant="warning" size="sm" wire:click="editDepartemen({{ $departemenBiro->id }})" icon="pencil"></flux:button>
                                        </flux:modal.trigger>

                                        <flux:modal.trigger name="delete">
                                            <flux:button variant="danger" size="sm" wire:click="confirmDelete({{ $departemenBiro->id }})" icon="trash"></flux:button>
                                        </flux:modal.trigger>
                                    </div>
                                </flux:table.cell>

                            </flux:table.row>
                        @empty
                            <flux:table.row>
                                <flux:table.cell colspan="6" class="text-center">
                                    <div class="flex flex-col items-center justify-center py-8">
                                        <flux:icon.building-office class="size-12 mb-2 text-gray-400" />
                                        <flux:heading size="lg">No departemen found</flux:heading>
                                        <flux:subheading>
                                            @if($search || $filterDivisi)
                                                Tidak ditemukan departemen/biro yang sesuai dengan kriteria pencarian
                                            @else
                                                Start by creating a new departemen/biro.
                                            @endif
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
            {{ $departemenBiros->links() }}
        </flux:card.footer>

        {{-- Form Modal --}}
        <flux:modal name="form" class="w-7xl">
            <div class="space-y-6">

                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $editingId ? 'Edit Departemen & Biro' : 'Add New Departemen & Biro' }}
                </flux:heading>

                <form wire:submit.prevent="saveDepartemen" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">

                            {{-- Logo --}}
                            <flux:field>
                                <flux:label>Logo</flux:label>
                                <flux:input type="file" wire:model="logo" accept="image/*" />
                                <flux:error name="logo" />

                                {{-- Logo Preview --}}
                                <div class="mt-2">
                                    @if ($logo)
                                        <img src="{{ $logo->temporaryUrl() }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                                    @elseif ($editingId && $logoPath)
                                        <img src="{{ Storage::url($logoPath) }}" alt="Current Logo" class="h-32 w-auto object-cover rounded">
                                    @endif
                                </div>
                            </flux:field>

                            {{-- Nama --}}
                            <flux:input label="Nama" wire:model="nama" required />

                            {{-- Divisi --}}
                            <flux:field>
                                <flux:label>Divisi</flux:label>
                                <flux:select wire:model="divisi" required>
                                    <option value="">Select Divisi</option>
                                    @foreach($divisiOptions as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </flux:select>
                                <flux:error name="divisi" />
                            </flux:field>

                            {{-- Deskripsi --}}
                            <flux:textarea
                                label="Deskripsi"
                                wire:model="deskripsi"
                                rows="4"
                            />

                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />

                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $editingId ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>

        {{-- Delete Modal --}}
        <flux:modal name="delete" class="min-w-[22rem]">
            <div class="space-y-6">
                <div>
                    <flux:heading size="lg">Delete Departemen/Biro?</flux:heading>

                    <flux:subheading>
                        <p>Are you sure you want to delete this departemen/biro?</p>
                        <p>This action cannot be undone.</p>
                    </flux:subheading>
                </div>

                <div class="flex gap-2">
                    <flux:spacer />

                    <flux:button variant="danger" wire:click="deleteDepartemen({{ $selectedForDelete ?? 0 }})">Delete</flux:button>
                </div>
            </div>
        </flux:modal>
    </flux:card>

    {{-- Detail Section --}}
    @if($selectedDepartemen)
        <flux:card>
            <flux:card.header class="flex justify-between items-center">
                <div>
                    <flux:heading size="lg" class="font-semibold">{{ $selectedDepartemen->nama }}</flux:heading>
                    <flux:subheading>Detail Departemen & Biro</flux:subheading>
                </div>
                <flux:button variant="ghost" wire:click="$set('selectedDepartemen', null)" icon="x-mark">
                    Tutup
                </flux:button>
            </flux:card.header>

            <flux:card.body>
                {{-- Tab Navigation --}}
                <div class="border-b border-gray-200 dark:border-gray-700 mb-6">
                    <nav class="-mb-px flex space-x-8">
                        <button wire:click="setActiveTab('fungsi')" 
                                class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'fungsi' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Fungsi ({{ $selectedDepartemen->fungsis->count() }})
                        </button>
                        <button wire:click="setActiveTab('program-kerja')" 
                                class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'program-kerja' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Program Kerja ({{ $selectedDepartemen->programKerjas->count() }})
                        </button>
                        <button wire:click="setActiveTab('agenda')" 
                                class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'agenda' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Agenda ({{ $selectedDepartemen->agendas->count() }})
                        </button>
                        <button wire:click="setActiveTab('anggota')" 
                                class="py-2 px-1 border-b-2 font-medium text-sm {{ $activeTab === 'anggota' ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }}">
                            Anggota ({{ $selectedDepartemen->anggotas->count() }})
                        </button>
                    </nav>
                </div>

                {{-- Tab Content --}}
                <div class="space-y-4">
                    {{-- Add New Button --}}
                    <div class="flex justify-end">
                        <flux:modal.trigger name="related-form">
                            <flux:button variant="primary" wire:click="createRelatedEntity('{{ $activeTab }}')" icon="plus">
                                Tambah {{ ucfirst($activeTab === 'program-kerja' ? 'Program Kerja' : $activeTab) }}
                            </flux:button>
                        </flux:modal.trigger>
                    </div>

                    {{-- Content based on active tab --}}
                    @if($activeTab === 'fungsi')
                        @forelse($selectedDepartemen->fungsis as $fungsi)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 flex justify-between items-center">
                                <div>
                                    <h4 class="font-medium">{{ $fungsi->judul }}</h4>
                                </div>
                                <div class="flex space-x-2">
                                    <flux:modal.trigger name="related-form">
                                        <flux:button variant="warning" size="sm" wire:click="editRelatedEntity('fungsi', {{ $fungsi->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>
                                    <flux:button variant="danger" size="sm" wire:click="deleteRelatedEntity('fungsi', {{ $fungsi->id }})" icon="trash" wire:confirm="Yakin ingin menghapus fungsi ini?"></flux:button>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada fungsi yang ditambahkan</p>
                        @endforelse
                    @endif

                    @if($activeTab === 'program-kerja')
                        @forelse($selectedDepartemen->programKerjas as $programKerja)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $programKerja->judul }}</h4>
                                    @if($programKerja->deskripsi)
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $programKerja->deskripsi }}</p>
                                    @endif
                                </div>
                                <div class="flex space-x-2">
                                    <flux:modal.trigger name="related-form">
                                        <flux:button variant="warning" size="sm" wire:click="editRelatedEntity('program-kerja', {{ $programKerja->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>
                                    <flux:button variant="danger" size="sm" wire:click="deleteRelatedEntity('program-kerja', {{ $programKerja->id }})" icon="trash" wire:confirm="Yakin ingin menghapus program kerja ini?"></flux:button>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada program kerja yang ditambahkan</p>
                        @endforelse
                    @endif

                    @if($activeTab === 'agenda')
                        @forelse($selectedDepartemen->agendas as $agenda)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium">{{ $agenda->judul }}</h4>
                                    @if($agenda->deskripsi)
                                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">{{ $agenda->deskripsi }}</p>
                                    @endif
                                </div>
                                <div class="flex space-x-2">
                                    <flux:modal.trigger name="related-form">
                                        <flux:button variant="warning" size="sm" wire:click="editRelatedEntity('agenda', {{ $agenda->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>
                                    <flux:button variant="danger" size="sm" wire:click="deleteRelatedEntity('agenda', {{ $agenda->id }})" icon="trash" wire:confirm="Yakin ingin menghapus agenda ini?"></flux:button>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada agenda yang ditambahkan</p>
                        @endforelse
                    @endif

                    @if($activeTab === 'anggota')
                        @forelse($selectedDepartemen->anggotas as $anggota)
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    @if($anggota->foto)
                                        <img src="{{ Storage::url($anggota->foto) }}" alt="{{ $anggota->nama }}" class="h-12 w-12 object-cover rounded-full">
                                    @else
                                        <div class="h-12 w-12 bg-gray-300 dark:bg-gray-600 rounded-full flex items-center justify-center">
                                            <flux:icon.user class="h-6 w-6 text-gray-500 dark:text-gray-400" />
                                        </div>
                                    @endif
                                    <div>
                                        <h4 class="font-medium">{{ $anggota->nama }}</h4>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $anggota->jabatan }}</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500">
                                            {{ $anggota->tahun_mulai }}{{ $anggota->tahun_selesai ? ' - ' . $anggota->tahun_selesai : '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex space-x-2">
                                    <flux:modal.trigger name="related-form">
                                        <flux:button variant="warning" size="sm" wire:click="editRelatedEntity('anggota', {{ $anggota->id }})" icon="pencil"></flux:button>
                                    </flux:modal.trigger>
                                    <flux:button variant="danger" size="sm" wire:click="deleteRelatedEntity('anggota', {{ $anggota->id }})" icon="trash" wire:confirm="Yakin ingin menghapus anggota ini?"></flux:button>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500 text-center py-4">Belum ada anggota yang ditambahkan</p>
                        @endforelse
                    @endif
                </div>
            </flux:card.body>
        </flux:card>

        {{-- Related Entity Form Modal --}}
        <flux:modal name="related-form" class="w-3xl">
            <div class="space-y-6">
                <flux:heading size="lg" class="font-semibold mb-6">
                    {{ $editingId ? 'Edit' : 'Tambah' }} {{ ucfirst($activeTab === 'program-kerja' ? 'Program Kerja' : $activeTab) }}
                </flux:heading>

                <form wire:submit.prevent="saveRelatedEntity('{{ $activeTab }}')" class="flex flex-col space-y-6">
                    <flux:fieldset>
                        <div class="space-y-6">
                            @if($activeTab === 'fungsi')
                                <flux:input label="Judul Fungsi" wire:model="fungsiJudul" required />
                            @elseif($activeTab === 'program-kerja')
                                <flux:input label="Judul Program Kerja" wire:model="programKerjaJudul" required />
                                <flux:textarea label="Deskripsi" wire:model="programKerjaDeskripsi" rows="3" />
                            @elseif($activeTab === 'agenda')
                                <flux:input label="Judul Agenda" wire:model="agendaJudul" required />
                                <flux:textarea label="Deskripsi" wire:model="agendaDeskripsi" rows="3" />
                            @elseif($activeTab === 'anggota')
                                {{-- Foto --}}
                                <flux:field>
                                    <flux:label>Foto</flux:label>
                                    <flux:input type="file" wire:model="anggotaFoto" accept="image/*" />
                                    <flux:error name="anggotaFoto" />
                                    
                                    @if ($anggotaFoto)
                                        <div class="mt-2">
                                            <img src="{{ $anggotaFoto->temporaryUrl() }}" alt="Preview" class="h-32 w-auto object-cover rounded">
                                        </div>
                                    @elseif ($editingId && $anggotaFotoPath)
                                        <div class="mt-2">
                                            <img src="{{ Storage::url($anggotaFotoPath) }}" alt="Current Photo" class="h-32 w-auto object-cover rounded">
                                        </div>
                                    @endif
                                </flux:field>

                                <flux:input label="Nama" wire:model="anggotaNama" required />
                                
                                <flux:field>
                                    <flux:label>Jabatan</flux:label>
                                    <flux:select wire:model="anggotaJabatan" required>
                                        <option value="">Pilih Jabatan</option>
                                        @foreach($jabatanOptions as $jabatan)
                                            <option value="{{ $jabatan }}">{{ $jabatan }}</option>
                                        @endforeach
                                    </flux:select>
                                    <flux:error name="anggotaJabatan" />
                                </flux:field>

                                <div class="grid grid-cols-2 gap-4">
                                    <flux:input type="number" label="Tahun Mulai" wire:model="anggotaTahunMulai" required />
                                    <flux:input type="number" label="Tahun Selesai" wire:model="anggotaTahunSelesai" />
                                </div>
                            @endif
                        </div>
                    </flux:fieldset>

                    <div class="flex">
                        <flux:spacer />
                        <flux:button type="submit" variant="primary" class="w-fit">
                            {{ $editingId ? 'Update' : 'Create' }}
                        </flux:button>
                    </div>
                </form>
            </div>
        </flux:modal>
    @endif

</flux:container>