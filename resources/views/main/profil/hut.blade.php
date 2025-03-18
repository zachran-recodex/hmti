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

    <title>HUT HMTI | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">HUT HMTI</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">HUT HMTI</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Hari Ulang Tahun -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="text-center mb-16">
                <flux:heading size="3xl" level="2" class="mb-8">
                    Hari Ulang Tahun HMTI
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Merayakan perjalanan dan pencapaian Himpunan Mahasiswa Teknik Industri Universitas Telkom setiap tahunnya.
                </p>
            </div>

            <!-- Current Celebration -->
            <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-8 mb-16">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="text-center md:text-left">
                        <h3 class="text-4xl font-bold text-primary mb-4">HUT HMTI ke-10</h3>
                        <p class="text-xl text-gray-600 mb-6">13 September 2023</p>
                        <div class="space-y-4">
                            <p class="text-gray-600">Satu dekade perjalanan HMTI dalam membentuk generasi unggul dan berprestasi.</p>
                            <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                                <span class="px-4 py-2 bg-primary/10 text-primary rounded-full">#10TahunHMTI</span>
                                <span class="px-4 py-2 bg-primary/10 text-primary rounded-full">#DecadeOfExcellence</span>
                            </div>
                        </div>
                    </div>
                    <div class="relative">
                        <img src="https://picsum.photos/200" alt="HUT HMTI Celebration" class="rounded-lg shadow-lg w-full">
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-8">
                    Galeri Perayaan HUT
                </flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @for ($i = 1; $i <= 6; $i++)
                        <div class="group relative overflow-hidden rounded-lg aspect-w-16 aspect-h-9">
                            <img
                                src="https://picsum.photos/200"
                                alt="HUT HMTI Gallery {{ $i }}"
                                class="object-cover w-full h-full transform group-hover:scale-110 transition-transform duration-300"
                            >
                            <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                <span class="text-white text-lg font-semibold">HUT ke-{{ 10 - $i }}</span>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Timeline -->
            <div class="relative">
                <flux:heading size="2xl" level="3" class="text-center mb-12">
                    Tema HUT HMTI
                </flux:heading>
                <div class="space-y-12">
                    @foreach ([
                        ['year' => '2023', 'theme' => 'Decade of Excellence', 'description' => 'Merayakan 10 tahun perjalanan HMTI'],
                        ['year' => '2022', 'theme' => 'Innovation & Growth', 'description' => 'Inovasi dan pengembangan organisasi'],
                        ['year' => '2021', 'theme' => 'Digital Transformation', 'description' => 'Adaptasi di era digital'],
                        ['year' => '2020', 'theme' => 'Resilient Together', 'description' => 'Bertahan dan berkembang di masa pandemi']
                    ] as $celebration)
                        <div class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow">
                            <div class="flex flex-col md:flex-row items-center gap-6">
                                <div class="bg-primary text-white px-6 py-3 rounded-full text-xl font-bold">
                                    {{ $celebration['year'] }}
                                </div>
                                <div>
                                    <h4 class="text-xl font-semibold mb-2">{{ $celebration['theme'] }}</h4>
                                    <p class="text-gray-600">{{ $celebration['description'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
