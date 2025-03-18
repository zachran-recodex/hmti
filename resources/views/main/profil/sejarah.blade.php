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

    <title>Sejarah HMTI | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Sejarah HMTI</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Sejarah HMTI</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Sejarah -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="text-center mb-16">
                <flux:heading size="3xl" level="2" class="mb-8">
                    Sejarah Perjalanan HMTI
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Perjalanan panjang Himpunan Mahasiswa Teknik Industri (HMTI) Universitas Telkom dalam membentuk dan mengembangkan organisasi kemahasiswaan yang berkualitas.
                </p>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-primary"></div>

                <!-- Timeline Items -->
                <div class="space-y-16">
                    <!-- 2013 -->
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="bg-primary text-white px-4 py-2 rounded-full text-xl font-bold">2013</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                            <h3 class="text-xl font-semibold mb-4">Pendirian HMTI</h3>
                            <p class="text-gray-600">
                                HMTI resmi didirikan sebagai wadah aspirasi dan pengembangan mahasiswa Teknik Industri Universitas Telkom.
                            </p>
                        </div>
                    </div>

                    <!-- 2015 -->
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="bg-primary text-white px-4 py-2 rounded-full text-xl font-bold">2015</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                            <h3 class="text-xl font-semibold mb-4">Pengembangan Organisasi</h3>
                            <p class="text-gray-600">
                                Pembentukan departemen-departemen baru untuk mengoptimalkan kinerja organisasi.
                            </p>
                        </div>
                    </div>

                    <!-- 2018 -->
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="bg-primary text-white px-4 py-2 rounded-full text-xl font-bold">2018</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                            <h3 class="text-xl font-semibold mb-4">Era Digitalisasi</h3>
                            <p class="text-gray-600">
                                Implementasi sistem informasi dan digitalisasi layanan HMTI untuk mahasiswa.
                            </p>
                        </div>
                    </div>

                    <!-- 2023 -->
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="bg-primary text-white px-4 py-2 rounded-full text-xl font-bold">2023</div>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg max-w-2xl mx-auto">
                            <h3 class="text-xl font-semibold mb-4">HMTI Modern</h3>
                            <p class="text-gray-600">
                                Transformasi HMTI menjadi organisasi modern dengan berbagai inovasi program kerja dan pelayanan mahasiswa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
