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

    <title>Shirt | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Shirt</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Sensecurrency</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Produk</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Shirt</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Main Section -->
    <section class="flex flex-row">

        @include('main.partials.sidebar')

        <div class="mx-auto py-8 sm:py-12 md:py-16">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col space-y-6">
                    <flux:heading size="4xl" level="2">Tentang Kami</flux:heading>

                    <div>
                        <flux:subheading size="3xl">
                            Profil Himpunan Mahasiswa Teknik Industri Telkom University
                        </flux:subheading>

                        <p class="text-lg text-gray-500">Himpunan Mahasiswa Teknik Informatika (HMTI) adalah organisasi mahasiswa yang bergerak di bidang teknologi informasi dan komunikasi. HMTI merupakan organisasi mahasiswa yang berada di bawah naungan Departemen Teknik Informatika Fakultas Teknik Universitas Telkom.</p>
                    </div>

                    <div>
                        <flux:subheading size="3xl">
                            Sejarah Himpunan Mahasiswa Teknik Industri Telkom University
                        </flux:subheading>

                        <p class="text-lg text-gray-500">Himpunan Mahasiswa Teknik Informatika (HMTI) adalah organisasi mahasiswa yang bergerak di bidang teknologi informasi dan komunikasi. HMTI merupakan organisasi mahasiswa yang berada di bawah naungan Departemen Teknik Informatika Fakultas Teknik Universitas Telkom.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
