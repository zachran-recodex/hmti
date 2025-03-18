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

    <title>Grand Design HMTI 2025 | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">Grand Design HMTI 2025</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Grand Design HMTI 2025</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Grand Design HMTI 2025 -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="text-center mb-16">
                <flux:heading size="3xl" level="2" class="mb-8">
                    Grand Design HMTI 2025
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Rencana strategis pengembangan Himpunan Mahasiswa Teknik Industri menuju HMTI yang unggul dan berdaya saing global.
                </p>
            </div>

            <!-- Vision 2025 -->
            <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-8 mb-16">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h3 class="text-3xl font-bold text-primary mb-6">Visi 2025</h3>
                        <p class="text-xl text-gray-700 leading-relaxed">
                            "Menjadi Himpunan Mahasiswa terdepan yang menghasilkan lulusan berkualitas dan berdaya saing global"
                        </p>
                    </div>
                    <div class="relative">
                        <img src="https://picsum.photos/800/500" alt="Vision 2025" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>

            <!-- Strategic Pillars -->
            <div class="mb-16">
                <flux:heading size="2xl" level="3" class="text-center mb-12">
                    Pilar Strategis
                </flux:heading>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-primary mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold mb-4">Organisasi Modern</h4>
                        <p class="text-gray-600">Pengembangan sistem organisasi yang efektif, efisien, dan berkelanjutan.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-primary mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold mb-4">SDM Unggul</h4>
                        <p class="text-gray-600">Pembentukan sumber daya manusia yang kompeten dan berdaya saing global.</p>
                    </div>
                    <div class="bg-white p-8 rounded-lg shadow-lg hover:shadow-xl transition-shadow">
                        <div class="text-primary mb-6">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <h4 class="text-xl font-semibold mb-4">Kolaborasi Global</h4>
                        <p class="text-gray-600">Membangun jejaring dan kerjasama dengan berbagai stakeholder internasional.</p>
                    </div>
                </div>
            </div>

            <!-- Roadmap -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <flux:heading size="2xl" level="3" class="text-center mb-12">
                    Roadmap Menuju 2025
                </flux:heading>
                <div class="space-y-8">
                    @foreach ([
                        ['year' => '2023', 'phase' => 'Fase Penguatan', 'goals' => ['Optimalisasi sistem organisasi', 'Pengembangan program unggulan', 'Peningkatan kualitas SDM']],
                        ['year' => '2024', 'phase' => 'Fase Pengembangan', 'goals' => ['Implementasi sistem digital', 'Perluasan jejaring kerjasama', 'Inovasi program kerja']],
                        ['year' => '2025', 'phase' => 'Fase Pencapaian', 'goals' => ['Pencapaian visi organisasi', 'Evaluasi dan keberlanjutan', 'Persiapan grand design berikutnya']]
                    ] as $roadmap)
                        <div class="border-l-4 border-primary pl-6 py-4">
                            <div class="flex items-center mb-4">
                                <span class="text-2xl font-bold text-primary">{{ $roadmap['year'] }}</span>
                                <span class="ml-4 text-xl font-semibold">{{ $roadmap['phase'] }}</span>
                            </div>
                            <ul class="space-y-2">
                                @foreach ($roadmap['goals'] as $goal)
                                    <li class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 text-primary mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ $goal }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
