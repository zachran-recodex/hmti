@section('meta_tag')
    <meta name="description" content="@yield('title') - HMTI Telkom University">
    <meta name="keywords" content="HMTI, Telkom University, Industrial Engineering, Error">
    <meta name="author" content="RECODEX ID">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <meta property="og:title" content="@yield('title') - HMTI Telkom University">
    <meta property="og:description" content="@yield('title') - HMTI Telkom University">
    <meta property="og:image" content="{{ asset('images/logo_hmti.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="@yield('title') - HMTI Telkom University">
    <meta name="twitter:description" content="@yield('title') - HMTI Telkom University">
    <meta name="twitter:image" content="{{ asset('images/logo_hmti.jpg') }}">

    <title>@yield('title') | HMTI Telkom University</title>
@endsection

<x-layouts.main>
    <!-- Error Hero Section -->
    <div class="relative overflow-hidden bg-zinc-900 h-[70vh]">
        <!-- Background with overlay -->
        <div class="absolute inset-0 bg-zinc-900/40"></div>
        <img src="{{ asset('images/gedung.jpg') }}" class="h-full w-full object-cover" alt="HMTI Building">

        <!-- Error Content -->
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center">
                <!-- Error Code -->
                <div class="text-8xl sm:text-9xl md:text-[12rem] font-bold text-zinc-50/20 mb-4">
                    @yield('code')
                </div>
                
                <!-- Error Title -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-zinc-50 mb-4">
                    @yield('title')
                </h1>
                
                <!-- Error Message -->
                <p class="text-lg sm:text-xl text-zinc-50/90 max-w-2xl mx-auto mb-8">
                    @yield('message')
                </p>
                
                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-secondary to-primary text-zinc-50 font-medium rounded-lg hover:from-primary hover:to-secondary transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Kembali ke Beranda
                    </a>
                    
                    <button onclick="history.back()" 
                            class="inline-flex items-center justify-center px-6 py-3 bg-quarternary/90 text-zinc-50 font-medium rounded-lg hover:bg-quarternary transition-all duration-300 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Halaman Sebelumnya
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Info Section -->
    <section class="py-8 md:py-12 lg:py-16">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <flux:heading size="3xl" level="2" class="mb-6">
                    Butuh Bantuan?
                </flux:heading>
                <flux:subheading size="xl" class="mb-8">
                    Berikut adalah beberapa cara yang bisa membantu Anda menemukan yang dicari.
                </flux:subheading>

                <!-- Help Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Navigation -->
                    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-r from-secondary to-primary rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-zinc-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-1.447-.894L15 4m0 13V4m0 0L9 7"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Jelajahi halaman utama untuk menemukan informasi yang Anda cari.
                        </p>
                        <a href="{{ route('home') }}" class="text-primary hover:text-secondary font-medium text-sm">
                            Lihat Beranda →
                        </a>
                    </div>

                    <!-- Profil -->
                    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-r from-secondary to-primary rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-zinc-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Tentang HMTI</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Pelajari lebih lanjut tentang organisasi dan kegiatan kami.
                        </p>
                        <a href="{{ route('profil.tentang-kami') }}" class="text-primary hover:text-secondary font-medium text-sm">
                            Tentang Kami →
                        </a>
                    </div>

                    <!-- Kontak -->
                    <div class="bg-zinc-50 dark:bg-zinc-800 rounded-lg p-6 shadow-lg">
                        <div class="w-12 h-12 bg-gradient-to-r from-secondary to-primary rounded-lg flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-zinc-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Hubungi Kami</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                            Masih ada pertanyaan? Jangan ragu untuk menghubungi kami.
                        </p>
                        <a href="mailto:info@hmtitelkomuniversity.com" class="text-primary hover:text-secondary font-medium text-sm">
                            Kirim Email →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Links Section -->
    <section class="py-8 md:py-12 lg:py-16 bg-zinc-900">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <flux:heading size="3xl" level="2" accent="disableDarkMode" class="mb-8">
                    Halaman Populer
                </flux:heading>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <a href="{{ route('profil.tentang-kami') }}" 
                       class="p-4 bg-zinc-800 rounded-lg hover:bg-zinc-700 transition-colors duration-200 text-zinc-50">
                        <div class="text-sm font-medium">Tentang Kami</div>
                    </a>
                    
                    <a href="{{ route('profil.ad-art') }}" 
                       class="p-4 bg-zinc-800 rounded-lg hover:bg-zinc-700 transition-colors duration-200 text-zinc-50">
                        <div class="text-sm font-medium">AD/ART</div>
                    </a>
                    
                    <a href="{{ route('profil.sejarah') }}" 
                       class="p-4 bg-zinc-800 rounded-lg hover:bg-zinc-700 transition-colors duration-200 text-zinc-50">
                        <div class="text-sm font-medium">Sejarah HMTI</div>
                    </a>
                    
                    <a href="{{ route('profil.panduan-logo') }}" 
                       class="p-4 bg-zinc-800 rounded-lg hover:bg-zinc-700 transition-colors duration-200 text-zinc-50">
                        <div class="text-sm font-medium">Panduan Logo</div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>