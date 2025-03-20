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

    <title>{{ $communityCommittee->title }} | HMTI Telkom University</title>
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
                    <flux:heading size="4xl" level="2" accent="disableDarkMode">{{ $communityCommittee->title }}</flux:heading>
                </div>
                <flux:breadcrumbs>
                    <flux:breadcrumbs.item disableDarkMode="true" href="{{ route('home') }}">Home</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">Community & Committee</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">{{ ucfirst($communityCommittee->category) }}</flux:breadcrumbs.item>
                    <flux:breadcrumbs.item disableDarkMode="true">{{ $communityCommittee->title }}</flux:breadcrumbs.item>
                </flux:breadcrumbs>
            </div>
        </div>
    </section>

    <!-- Community & Committee -->
    <section class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Community & Committee Overview -->
            <div class="text-center">
                @if($communityCommittee->logo)
                    <img class="h-32 w-auto mx-auto mb-8" src="{{ Storage::url($communityCommittee->logo) }}" alt="{{ $communityCommittee->title }}">
                @else
                    <img class="h-32 w-auto mx-auto mb-8" src="{{ asset('images/logo.png') }}" alt="{{ $communityCommittee->title }}">
                @endif
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    {{ $communityCommittee->description }}
                </p>
            </div>
        </div>
    </section>
</x-layouts.main>