@section('meta_tag')
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">

    <link rel="canonical" href="{{ url()->current() }}">

    <title>Departemen Kaderisasi | HMTI Telkom University</title>
@endsection

<x-layouts.main>
    <!-- Breadcrumb -->
    <section class="bg-primary py-8 sm:py-12 md:py-16 relative overflow-hidden">
        <!-- Decorative pattern -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M0 20 V0 H40" fill="none" stroke="currentColor" stroke-width="1"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid)" />
            </svg>
        </div>

        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center">
                <div class="mb-6 text-center">
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Departemen Kaderisasi</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Departemen & Biro</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Internal</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Departemen Kaderisasi</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Human Resource Departemen -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Departemen Overview -->
            <div class="text-center mb-16">
                <img class="h-32 w-auto mx-auto mb-8" src="{{ asset('images/hrd.png') }}" alt="HRD Logo">
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Departemen yang bertanggung jawab dalam pengembangan sumber daya manusia HMTI untuk menciptakan kader organisasi yang berkualitas dan profesional.
                </p>
            </div>

            <!-- Fungsi -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Fungsi</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">ORATION (Maroon Preparation)</h4>
                        <p class="text-gray-600">Program pelatihan kepemimpinan untuk membentuk kader organisasi yang berkualitas.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Sosialisasi Kaderisasi</h4>
                        <p class="text-gray-600">Pemetaan bakat dan potensi anggota untuk pengembangan yang terarah.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">LEGION (Industrial Engineering Orientation)</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Ekuivalensi</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                </div>
            </div>

            <!-- Programs -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Program Kerja</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">ORATION (Maroon Preparation)</h4>
                        <p class="text-gray-600">Program pelatihan kepemimpinan untuk membentuk kader organisasi yang berkualitas.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Sosialisasi Kaderisasi</h4>
                        <p class="text-gray-600">Pemetaan bakat dan potensi anggota untuk pengembangan yang terarah.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">LEGION (Industrial Engineering Orientation)</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Ekuivalensi</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                </div>
            </div>

            <!-- Agenda -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Agenda</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">ORATION (Maroon Preparation)</h4>
                        <p class="text-gray-600">Program pelatihan kepemimpinan untuk membentuk kader organisasi yang berkualitas.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Sosialisasi Kaderisasi</h4>
                        <p class="text-gray-600">Pemetaan bakat dan potensi anggota untuk pengembangan yang terarah.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">LEGION (Industrial Engineering Orientation)</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                    <div class="bg-white border border-zinc-200 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <h4 class="text-xl font-semibold mb-4">Ekuivalensi</h4>
                        <p class="text-gray-600">Program pengembangan keterampilan teknis dan non-teknis anggota.</p>
                    </div>
                </div>
            </div>


            <!-- Departemen Structure -->
            <div class="bg-white border border-zinc-200 rounded-lg shadow-lg p-8">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Struktur Departemen</flux:heading>
                <div class="text-center mb-6">
                    <img src="https://picsum.photos/200" alt="Kepala" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                    <h4 class="text-lg font-semibold">Nama Kepala</h4>
                    <p class="text-gray-600">Kepala Departemen</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ([
                        ['position' => 'Kepala Departemen', 'name' => 'John Doe', 'image' => 'https://picsum.photos/200'],
                        ['position' => 'Wakil Kepala Departemen', 'name' => 'Jane Smith', 'image' => 'https://picsum.photos/201'],
                        ['position' => 'Sekretaris', 'name' => 'Alice Johnson', 'image' => 'https://picsum.photos/202'],
                        ['position' => 'Staff', 'name' => 'Bob Wilson', 'image' => 'https://picsum.photos/203']
                    ] as $member)
                        <div class="text-center">
                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                            <h4 class="text-lg font-semibold">{{ $member['name'] }}</h4>
                            <p class="text-gray-600">{{ $member['position'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
