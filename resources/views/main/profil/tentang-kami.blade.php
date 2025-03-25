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
                    {{ $tentang->definisi }}
                </p>
            </div>
            <div class="text-center">
                <flux:heading size="3xl" level="2">
                    Kedudukan dan Peran
                </flux:heading>
                <p class="mt-4 text-lg text-gray-600 max-w-7xl mx-auto">
                    {{ $tentang->kedudukan_peran }}
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
                        {{ $tentang->visi }}
                    </p>
                </div>
                <!-- Mission -->
                <div class="bg-white p-8 rounded-lg shadow-sm">
                    <flux:heading size="2xl" level="3" class="mb-6">Misi</flux:heading>
                    <ul class="space-y-4 text-gray-600">
                        @foreach ($tentang->misi as $key => $item)
                            <li class="flex items-start">
                                <span class="mr-2">{{ $key + 1 }}.</span>
                                <span>
                                    {{ $item }}
                                </span>
                            </li>
                        @endforeach
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

            <!-- Organizational Structure Image -->
            <div class="max-w-5xl mx-auto mb-12">
                <img
                    src="{{ Storage::url($tentang->gambar_stuktural)  }}"
                    alt="Struktur Organisasi HMTI"
                    class="w-full h-auto shadow-lg rounded-lg border border-gray-600"
                >
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
                    @foreach($intis->take(2) as $inti)
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ Storage::url($inti->photo) }}" alt="{{ $inti->position }}" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">{{ $inti->name }}</h4>
                        <p class="text-primary font-medium">{{ $inti->position }}</p>
                    </div>
                    @endforeach
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($intis->skip(2) as $inti)
                    <div class="text-center">
                        <div class="relative w-48 h-48 mx-auto mb-4">
                            <img src="{{ Storage::url($inti->photo) }}" alt="{{ $inti->position }}" class="rounded-full w-full h-full object-cover shadow-lg">
                        </div>
                        <h4 class="text-xl font-semibold mb-1">{{ $inti->name }}</h4>
                        <p class="text-primary font-medium">{{ $inti->position }}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            @foreach($divisions as $division)
                @if($departemenBiros->has($division))
                <div class="mb-16">
                    <flux:heading size="2xl" level="3" class="text-center mb-12">{{ $division }}</flux:heading>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($departemenBiros[$division] as $departemenBiro)
                            @foreach($departemenBiro->members as $member)
                            <div class="bg-white p-6 rounded-lg shadow-sm text-center">
                                <div class="relative w-32 h-32 mx-auto mb-4">
                                    <img src="{{ asset('images/placeholder-person.jpg') }}"
                                        alt="Kepala {{ $departemenBiro->title }}"
                                        class="rounded-full w-full h-full object-cover shadow-md">
                                </div>
                                <h4 class="text-lg font-semibold mb-1">{{ $member->name }}</h4>
                                <p class="text-primary font-medium">Kepala {{ $departemenBiro->title }}</p>
                            </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </section>
</x-layouts.main>
