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

    <title>Panduan Logo HMTI | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Panduan Logo HMTI</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Panduan Logo HMTI</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Panduan Logo HMTI -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="text-center mb-16">
                <flux:heading size="3xl" level="2" class="mb-8">
                    Panduan Penggunaan Logo HMTI
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Pedoman resmi penggunaan logo Himpunan Mahasiswa Teknik Industri (HMTI) Universitas Telkom untuk menjaga konsistensi dan identitas visual organisasi.
                </p>
            </div>

            <!-- Logo Preview -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('images/logo/hmti-primary.png') }}" alt="Logo HMTI Primary" class="h-48 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Logo Utama</h3>
                    <p class="text-gray-600">Versi utama logo HMTI dengan warna primer</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                    <img src="{{ asset('images/logo/hmti-monochrome.png') }}" alt="Logo HMTI Monochrome" class="h-48 mx-auto mb-4">
                    <h3 class="text-xl font-semibold mb-2">Logo Monokrom</h3>
                    <p class="text-gray-600">Versi hitam putih untuk penggunaan khusus</p>
                </div>
            </div>

            <!-- Guidelines -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden mb-16">
                <div class="p-8">
                    <flux:heading size="2xl" level="3" class="mb-8">Ketentuan Penggunaan</flux:heading>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Yang Diperbolehkan</h4>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Gunakan logo dengan proporsi yang benar
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Pertahankan area kosong minimum
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Gunakan warna resmi yang ditentukan
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4">Yang Tidak Diperbolehkan</h4>
                            <ul class="space-y-3 text-gray-600">
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Mengubah proporsi atau mendistorsi logo
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Mengubah warna tanpa izin
                                </li>
                                <li class="flex items-start">
                                    <svg class="h-6 w-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Menambahkan efek visual yang tidak sesuai
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Downloads -->
            <div class="bg-gray-50 rounded-lg p-8">
                <flux:heading size="2xl" level="3" class="mb-8 text-center">Unduh Logo</flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <a href="{{ asset('downloads/logo-hmti-png.zip') }}" class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="h-12 w-12 text-primary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <h4 class="font-semibold mb-2">Format PNG</h4>
                        <p class="text-sm text-gray-500 text-center">Untuk penggunaan digital</p>
                    </a>
                    <a href="{{ asset('downloads/logo-hmti-svg.zip') }}" class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="h-12 w-12 text-primary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <h4 class="font-semibold mb-2">Format SVG</h4>
                        <p class="text-sm text-gray-500 text-center">Untuk penggunaan skala besar</p>
                    </a>
                    <a href="{{ asset('downloads/logo-hmti-ai.zip') }}" class="flex flex-col items-center p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow">
                        <svg class="h-12 w-12 text-primary mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        <h4 class="font-semibold mb-2">Format AI</h4>
                        <p class="text-sm text-gray-500 text-center">File sumber Adobe Illustrator</p>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
