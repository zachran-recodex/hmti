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

    <title>AD/ART | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">AD/ART</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Profil</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">AD/ART</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- AD/ART -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Introduction -->
            <div class="text-center mb-12">
                <flux:heading size="3xl" level="2" class="mb-8">
                    Anggaran Dasar dan Anggaran Rumah Tangga
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                    Landasan hukum dan tata aturan yang mengatur seluruh kegiatan dan penyelenggaraan Himpunan Mahasiswa Teknik Industri (HMTI) Universitas Telkom.
                </p>
            </div>

            <!-- PDF Viewer -->
            @if($adArt && $adArt->file_path)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="aspect-w-16 aspect-h-9">
                        <iframe
                            src="{{ Storage::url($adArt->file_path) }}"
                            class="w-full h-[800px]"
                            type="application/pdf"
                            frameborder="0"
                        ></iframe>
                    </div>
                    <div class="p-4 border-t border-gray-200 bg-gray-50">
                        <div class="flex justify-between items-center">
                            <a
                                href="{{ Storage::url($adArt->file_path) }}"
                                download
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                                Download PDF
                            </a>
                            <span class="text-sm text-gray-500">Format: PDF</span>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">Dokumen AD/ART belum tersedia.</p>
                </div>
            @endif
        </div>
    </section>
</x-layouts.main>
