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

    <title>Tentang Kami | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Tentang Kami</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Tentang Kami</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Tentang Kami -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-8">
                <flux:heading size="3xl" level="2">
                    Definisi
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-7xl mx-auto">
                    HMTI Univesitas Telkom adalah sebuah organisasi yang beranggotakan dan mewadahi
                    seluruh mahasiswa Prodi Teknik Industri dan Manajemen Rekayasa Fakultas Rekayasa
                    Industri Universitas Telkom.
                </p>
            </div>
            <div class="text-center">
                <flux:heading size="3xl" level="2">
                    Kedudukan dan Peran
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-7xl mx-auto">
                    HMTI Univesitas Telkom bersifat independen dan lembaga non-struktural. Fungsi HMTI
                    di Telkom University adalah lembaga eksekutif dan organisasi yang bertugas untuk
                    menampung aspirasi dari seluruh mahasiswa Teknik Industri dan Manajemen Rekayasa.
                    Serta mengkoordinasikan dan merealisasikan segala kegiatan mahasiswa Teknik Industri.
                    Selain itu, HMTI juga berperan untuk menciptakan kader-kader Teknik Industri yang
                    pedulii dan berperan aktif dalam memajukkan Fakultas, Program Studi, dan Himpunan.
                </p>
            </div>
        </div>
    </section>

    <!-- Visi Misi -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Vision -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <flux:heading size="2xl" level="3" class="mb-6">Visi</flux:heading>
                    <p class="text-gray-600">
                        Terwujudnya entitas HMTI Universitas Telkom yang memiliki siikap solutif, kredibel,
                        dan dapat bersinergi dengan improvisasi dalam wadah yang ada di HMTI Universitas
                        Telkom.
                    </p>
                </div>
                <!-- Mission -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <flux:heading size="2xl" level="3" class="mb-6">Misi</flux:heading>
                    <ul class="space-y-4 text-gray-600">
                        <li class="flex items-start">
                            <span class="mr-2">1.</span>
                            <span>
                                Mengembangkan sumber daya entiitas HMTI Universitas Telkom dengan mengaplikasikan
                                keilmuan teknik industri dan fungsi mahasiswa dalam kegiatan yang ada di HMTI
                            </span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">2.</span>
                            <span>
                                Mengembangkan koordinasi antar entitas guna memaksimalkan fasilitas yang telah ada di HMTI
                            </span>
                        </li>
                        <li class="flex items-start">
                            <span class="mr-2">3.</span>
                            <span>
                                Berkontribusi aktif sebagai jembatan untuk entitas HMTI Universitas Telkom dengan memperhatikan
                                nilai-nilai yang ada di HMTI
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Struktur -->
    <section class="py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <flux:heading size="3xl" level="2">Struktural Organisasi</flux:heading>
                <p class="mt-4 text-lg text-gray-600">BPH HMTI 2025/2026</p>
            </div>
        </div>
    </section>

    <!-- Inti dan Kepala Departemen dan Biro -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Pengurus Inti -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Inti</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pb-8">
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Ketua HMTI" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">Nama Ketua</h4>
                        <p class="text-primary font-medium">Ketua HMTI</p>
                    </div>
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Wakil Ketua HMTI" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">Nama Wakil</h4>
                        <p class="text-primary font-medium">Wakil Ketua HMTI</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Wakil Ketua HMTI" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">Nama Sekjen</h4>
                        <p class="text-primary font-medium">Sekretaris Jenderal HMTI</p>
                    </div>
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Sekretaris HMTI" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">Nama Sekretaris</h4>
                        <p class="text-primary font-medium">Sekretaris HMTI</p>
                    </div>
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Bendahara HMTI" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">Nama Bendahara</h4>
                        <p class="text-primary font-medium">Bendahara HMTI</p>
                    </div>
                </div>
            </div>

            <!-- Kepala Internal -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">Internal</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Cards -->
                    @foreach(['Human Resource', 'Kaderisasi', 'Kemahasiswaan'] as $internal)
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Kadep {{ $internal }}" class="rounded-full w-full h-full object-cover shadow-md">
                        </div>
                        <h4 class="text-lg font-semibold mb-1">Nama Kadep</h4>
                        <p class="text-primary font-medium">Kepala Departemen {{ $internal }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Kepala PSTI -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">PSTI</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Cards -->
                    @foreach(['Akademik', 'Generasi Bisnis', 'Riset dan Kompetisi'] as $psti)
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Kadep {{ $psti }}" class="rounded-full w-full h-full object-cover shadow-md">
                        </div>
                        <h4 class="text-lg font-semibold mb-1">Nama Kadep</h4>
                        <p class="text-primary font-medium">Kepala Departemen {{ $psti }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Kepala Eksternal -->
            <div>
                <flux:heading size="2xl" level="3" class="text-center mb-12">Eksternal</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Biro cards -->
                    @foreach(['Komunikasi dan Informasi', 'Dedikasi Masyarakat', 'Public Relation'] as $biro)
                    <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                        <div class="relative w-32 h-32 mx-auto mb-4">
                            <img src="{{ asset('images/placeholder-person.jpg') }}" alt="Kabiro {{ $biro }}" class="rounded-full w-full h-full object-cover shadow-md">
                        </div>
                        <h4 class="text-lg font-semibold mb-1">Nama Kabiro</h4>
                        <p class="text-primary font-medium">Kepala {{ $biro }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
