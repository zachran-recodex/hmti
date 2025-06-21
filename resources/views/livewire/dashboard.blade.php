<flux:container class="space-y-6">
    <!-- Page Header -->
    <div class="sm:flex sm:items-center sm:justify-between">
        <div>
            <flux:heading size="xl" class="font-bold!">Dashboard HMTI</flux:heading>
            <flux:subheading>
                Selamat datang, {{ auth()->user()->name }}! Berikut adalah ringkasan data organisasi.
            </flux:subheading>
        </div>
        <div class="text-sm text-gray-600 dark:text-gray-400">
            Terakhir diperbarui: {{ $systemInfo['last_updated'] ? \Carbon\Carbon::parse($systemInfo['last_updated'])->diffForHumans() : 'Belum ada data' }}
        </div>
    </div>

    <!-- Main Statistics Cards -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Users -->
        <flux:card>
            <flux:card.body class="flex items-center justify-between">
                <div>
                    <flux:heading size="lg" class="font-bold text-blue-600">{{ $stats['total_users'] }}</flux:heading>
                    <flux:subheading>Total Users</flux:subheading>
                </div>
                <div class="rounded-lg bg-blue-100 dark:bg-blue-900 p-3">
                    <flux:icon.users class="h-6 w-6 text-blue-600 dark:text-blue-400" />
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Total Departemen -->
        <flux:card>
            <flux:card.body class="flex items-center justify-between">
                <div>
                    <flux:heading size="lg" class="font-bold text-green-600">{{ $stats['total_departemen'] }}</flux:heading>
                    <flux:subheading>Departemen & Biro</flux:subheading>
                </div>
                <div class="rounded-lg bg-green-100 dark:bg-green-900 p-3">
                    <flux:icon.building-office class="h-6 w-6 text-green-600 dark:text-green-400" />
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Total Community & Committee -->
        <flux:card>
            <flux:card.body class="flex items-center justify-between">
                <div>
                    <flux:heading size="lg" class="font-bold text-purple-600">{{ $stats['total_community_committee'] }}</flux:heading>
                    <flux:subheading>Community & Committee</flux:subheading>
                </div>
                <div class="rounded-lg bg-purple-100 dark:bg-purple-900 p-3">
                    <flux:icon.user-group class="h-6 w-6 text-purple-600 dark:text-purple-400" />
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Total Inti -->
        <flux:card>
            <flux:card.body class="flex items-center justify-between">
                <div>
                    <flux:heading size="lg" class="font-bold text-orange-600">{{ $stats['total_inti'] }}</flux:heading>
                    <flux:subheading>Pengurus Inti</flux:subheading>
                </div>
                <div class="rounded-lg bg-orange-100 dark:bg-orange-900 p-3">
                    <flux:icon.star class="h-6 w-6 text-orange-600 dark:text-orange-400" />
                </div>
            </flux:card.body>
        </flux:card>
    </div>

    <!-- Secondary Statistics -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Anggota -->
        <flux:card>
            <flux:card.body class="text-center">
                <flux:heading size="lg" class="font-bold text-gray-700">{{ $stats['total_anggota'] }}</flux:heading>
                <flux:subheading>Total Anggota</flux:subheading>
                <div class="mt-2 flex justify-center space-x-4 text-sm">
                    <span class="text-green-600">{{ $activeAnggota }} Aktif</span>
                    <span class="text-gray-500">{{ $inactiveAnggota }} Nonaktif</span>
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Program Kerja -->
        <flux:card>
            <flux:card.body class="text-center">
                <flux:heading size="lg" class="font-bold text-gray-700">{{ $stats['total_program_kerja'] }}</flux:heading>
                <flux:subheading>Program Kerja</flux:subheading>
            </flux:card.body>
        </flux:card>

        <!-- Agenda -->
        <flux:card>
            <flux:card.body class="text-center">
                <flux:heading size="lg" class="font-bold text-gray-700">{{ $stats['total_agenda'] }}</flux:heading>
                <flux:subheading>Agenda</flux:subheading>
            </flux:card.body>
        </flux:card>

        <!-- Fungsi -->
        <flux:card>
            <flux:card.body class="text-center">
                <flux:heading size="lg" class="font-bold text-gray-700">{{ $stats['total_fungsi'] }}</flux:heading>
                <flux:subheading>Fungsi</flux:subheading>
            </flux:card.body>
        </flux:card>
    </div>

    <!-- Charts and Breakdowns -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <!-- Departemen by Divisi -->
        <flux:card>
            <flux:card.header>
                <flux:heading size="lg" class="font-semibold">Departemen & Biro per Divisi</flux:heading>
            </flux:card.header>
            <flux:card.body>
                <div class="space-y-4">
                    @foreach($departemenByDivisi as $divisi)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <flux:badge 
                                    size="sm"
                                    :color="$divisi->divisi === 'Internal' ? 'blue' : ($divisi->divisi === 'PSTI' ? 'green' : 'purple')"
                                >
                                    {{ $divisi->divisi }}
                                </flux:badge>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">{{ $divisi->total }}</span>
                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                    <div class="h-2 rounded-full" 
                                         style="width: {{ ($divisi->total / $stats['total_departemen']) * 100 }}%; background-color: {{ $divisi->divisi === 'Internal' ? '#3B82F6' : ($divisi->divisi === 'PSTI' ? '#10B981' : '#8B5CF6') }}"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Community vs Committee -->
        <flux:card>
            <flux:card.header>
                <flux:heading size="lg" class="font-semibold">Community vs Committee</flux:heading>
            </flux:card.header>
            <flux:card.body>
                <div class="space-y-4">
                    @foreach($communityCommitteeStats as $category)
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <flux:badge 
                                    size="sm"
                                    :color="$category->category === 'Community' ? 'indigo' : 'pink'"
                                >
                                    {{ $category->category }}
                                </flux:badge>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="font-semibold">{{ $category->total }}</span>
                                <div class="w-20 bg-gray-200 rounded-full h-2">
                                    <div class="h-2 rounded-full" 
                                         style="width: {{ ($category->total / $stats['total_community_committee']) * 100 }}%; background-color: {{ $category->category === 'Community' ? '#6366F1' : '#EC4899' }}"></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </flux:card.body>
        </flux:card>
    </div>

    <!-- Pengurus Inti Breakdown -->
    @if($intiByPosition->count() > 0)
    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Struktur Pengurus Inti</flux:heading>
        </flux:card.header>
        <flux:card.body>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($intiByPosition as $position)
                    <div class="rounded-lg bg-gray-50 dark:bg-gray-800 p-4 text-center">
                        <flux:heading size="sm" class="font-semibold">{{ $position->position }}</flux:heading>
                        <flux:badge color="gray" class="mt-2">{{ $position->total }} orang</flux:badge>
                    </div>
                @endforeach
            </div>
        </flux:card.body>
    </flux:card>
    @endif

    <!-- Recent Activities -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Recent Departemen -->
        <flux:card>
            <flux:card.header>
                <flux:heading size="lg" class="font-semibold">Departemen Terbaru</flux:heading>
            </flux:card.header>
            <flux:card.body>
                <div class="space-y-3">
                    @forelse($recentDepartemen as $departemen)
                        <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-2 last:border-b-0">
                            <div>
                                <div class="font-medium text-sm">{{ $departemen->nama }}</div>
                                <flux:badge size="sm" color="gray">{{ $departemen->divisi }}</flux:badge>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $departemen->created_at->format('d M') }}
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-4">
                            <flux:icon.building-office class="mx-auto h-8 w-8 mb-2" />
                            <p class="text-sm">Belum ada departemen</p>
                        </div>
                    @endforelse
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Recent Community/Committee -->
        <flux:card>
            <flux:card.header>
                <flux:heading size="lg" class="font-semibold">Community/Committee Terbaru</flux:heading>
            </flux:card.header>
            <flux:card.body>
                <div class="space-y-3">
                    @forelse($recentCommunity as $community)
                        <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-2 last:border-b-0">
                            <div>
                                <div class="font-medium text-sm">{{ $community->title }}</div>
                                <flux:badge size="sm" :color="$community->category === 'Community' ? 'indigo' : 'pink'">
                                    {{ $community->category }}
                                </flux:badge>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $community->created_at->format('d M') }}
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-4">
                            <flux:icon.user-group class="mx-auto h-8 w-8 mb-2" />
                            <p class="text-sm">Belum ada community/committee</p>
                        </div>
                    @endforelse
                </div>
            </flux:card.body>
        </flux:card>

        <!-- Recent Anggota -->
        <flux:card>
            <flux:card.header>
                <flux:heading size="lg" class="font-semibold">Anggota Terbaru</flux:heading>
            </flux:card.header>
            <flux:card.body>
                <div class="space-y-3">
                    @forelse($recentAnggota as $anggota)
                        <div class="flex items-center justify-between border-b border-gray-100 dark:border-gray-700 pb-2 last:border-b-0">
                            <div>
                                <div class="font-medium text-sm">{{ $anggota->nama }}</div>
                                <div class="text-xs text-gray-500">
                                    {{ $anggota->jabatan }} - {{ $anggota->departemenBiro->nama ?? 'Tidak ada departemen' }}
                                </div>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ $anggota->created_at->format('d M') }}
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-4">
                            <flux:icon.users class="mx-auto h-8 w-8 mb-2" />
                            <p class="text-sm">Belum ada anggota</p>
                        </div>
                    @endforelse
                </div>
            </flux:card.body>
        </flux:card>
    </div>

    <!-- System Status -->
    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Status Sistem</flux:heading>
        </flux:card.header>
        <flux:card.body>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        @if($systemInfo['has_ad_art'])
                            <flux:icon.check-circle class="h-5 w-5 text-green-500" />
                        @else
                            <flux:icon.x-circle class="h-5 w-5 text-red-500" />
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-medium">AD/ART</div>
                        <div class="text-xs text-gray-500">
                            {{ $systemInfo['has_ad_art'] ? 'Tersedia' : 'Belum tersedia' }}
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        @if($systemInfo['has_tentang_kami'])
                            <flux:icon.check-circle class="h-5 w-5 text-green-500" />
                        @else
                            <flux:icon.x-circle class="h-5 w-5 text-red-500" />
                        @endif
                    </div>
                    <div>
                        <div class="text-sm font-medium">Tentang Kami</div>
                        <div class="text-xs text-gray-500">
                            {{ $systemInfo['has_tentang_kami'] ? 'Tersedia' : 'Belum tersedia' }}
                        </div>
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <flux:icon.clock class="h-5 w-5 text-blue-500" />
                    </div>
                    <div>
                        <div class="text-sm font-medium">Sinkronisasi</div>
                        <div class="text-xs text-gray-500">
                            {{ $systemInfo['last_updated'] ? 'Terkini' : 'Belum ada data' }}
                        </div>
                    </div>
                </div>
            </div>
        </flux:card.body>
    </flux:card>

    <!-- Quick Actions -->
    <flux:card>
        <flux:card.header>
            <flux:heading size="lg" class="font-semibold">Aksi Cepat</flux:heading>
        </flux:card.header>
        <flux:card.body>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @can('manage users')
                <a href="{{ route('dashboard.admin.user') }}" class="flex items-center space-x-3 rounded-lg border border-gray-200 dark:border-gray-700 p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <flux:icon.users class="h-6 w-6 text-blue-500" />
                    <div>
                        <div class="font-medium text-sm">Kelola Users</div>
                        <div class="text-xs text-gray-500">Manajemen pengguna</div>
                    </div>
                </a>
                @endcan

                <a href="{{ route('dashboard.departemen-biro') }}" class="flex items-center space-x-3 rounded-lg border border-gray-200 dark:border-gray-700 p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <flux:icon.building-office class="h-6 w-6 text-green-500" />
                    <div>
                        <div class="font-medium text-sm">Departemen & Biro</div>
                        <div class="text-xs text-gray-500">Kelola departemen</div>
                    </div>
                </a>

                <a href="{{ route('dashboard.community-committee') }}" class="flex items-center space-x-3 rounded-lg border border-gray-200 dark:border-gray-700 p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <flux:icon.user-group class="h-6 w-6 text-purple-500" />
                    <div>
                        <div class="font-medium text-sm">Community & Committee</div>
                        <div class="text-xs text-gray-500">Kelola community</div>
                    </div>
                </a>

                <a href="{{ route('dashboard.inti') }}" class="flex items-center space-x-3 rounded-lg border border-gray-200 dark:border-gray-700 p-4 hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                    <flux:icon.star class="h-6 w-6 text-orange-500" />
                    <div>
                        <div class="font-medium text-sm">Pengurus Inti</div>
                        <div class="text-xs text-gray-500">Kelola pengurus</div>
                    </div>
                </a>
            </div>
        </flux:card.body>
    </flux:card>
</flux:container>