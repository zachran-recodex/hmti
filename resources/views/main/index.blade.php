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

    <title>Home | HMTI Telkom University</title>
@endsection

<x-layouts.main>
    <!-- Hero Section with Carousel -->
    <div x-data="{
    activeSlide: 0,
    slides: [
        {
            image: '{{ asset('images/gedung.jpg') }}',
            title: 'Industrial Engineering Student Association',
            subtitle: 'Building the future engineers of tomorrow'
        },
        {
            image: 'https://picsum.photos/id/2/1920/1080',
            title: 'Join Our Community',
            subtitle: 'Connect with fellow students and industry professionals'
        },
        {
            image: 'https://picsum.photos/id/3/1920/1080',
            title: 'Excellence in Engineering',
            subtitle: 'Developing skills, knowledge, and innovation'
        }
    ],
    loop() {
        setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length
        }, 5000)
    }
}"
         x-init="loop()"
         class="relative overflow-hidden bg-zinc-900 h-[70vh]">
        <!-- Slides -->
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 transform scale-105"
                 x-transition:enter-end="opacity-100 transform scale-100"
                 x-transition:leave="transition ease-in duration-500"
                 x-transition:leave-start="opacity-100 transform scale-100"
                 x-transition:leave-end="opacity-0 transform scale-95"
                 class="absolute inset-0">
                <!-- Background image with overlay -->
                <div class="absolute inset-0 bg-zinc-900/40"></div>
                <img :src="slide.image" class="h-full w-full object-cover" :alt="slide.title" alt="" src="">

                <!-- Text content -->
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center">
                        <h1
                            x-text="slide.title"
                            class="text-3xl sm:text-4xl md:text-5xl font-bold text-zinc-50 mb-4"
                            x-transition:enter="transition ease-out delay-300 duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                        </h1>
                        <p
                            x-text="slide.subtitle"
                            class="text-lg sm:text-xl text-zinc-50/90 max-w-2xl mx-auto mb-8"
                            x-transition:enter="transition ease-out delay-500 duration-500"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                        </p>
                    </div>
                </div>
            </div>
        </template>

        <!-- Arrow navigation -->
        <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="cursor-pointer absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-quarternary/90 p-2 text-zinc-50 hover:bg-quarternary focus:outline-none transition-all duration-300 hover:scale-110">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
        <button @click="activeSlide = (activeSlide + 1) % slides.length" class="cursor-pointer absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-quarternary/90 p-2 text-zinc-50 hover:bg-quarternary focus:outline-none transition-all duration-300 hover:scale-110">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- end of carousel container -->
    </div>

    <!-- Cards section below the carousel (moved outside as a separate section) -->
    <div class="relative -mt-24 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900 dark:border-zinc-200">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/surat_edaran.png') }}" alt="Surat Edaran" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900 dark:border-zinc-200">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/surat_kegiatan.png') }}" alt="Surat Kegiatan" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900 dark:border-zinc-200">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/informasi_lomba.png') }}" alt="Informasi Lomba" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900 dark:border-zinc-200">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/berita.png') }}" alt="Berita" class="h-full w-full object-cover">
                </div>
            </a>
        </div>
    </div>

    <!-- Banner Section -->
    <section class="py-8 md:py-12 lg:py-16">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <img
                    src="{{ asset('images/banner.png') }}"
                    alt="Banner"
                    class="w-full max-w-[1440px] h-auto aspect-[1440/440] object-cover rounded-lg border border-zinc-900"
                >
            </div>
        </div>
    </section>

    <!-- Counter Section -->
    <section class="py-8 md:py-12 lg:py-16 bg-zinc-900">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 lg:gap-8">
                <div class="h-fit py-4 px-2 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-3xl md:text-4xl font-semibold text-quarternary">1300+</span>
                    <h3 class="text-xl md:text-2xl text-zinc-50">Mahasiswa/i</h3>
                </div>
                <div class="h-fit py-4 px-2 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-3xl md:text-4xl font-semibold text-quarternary">8627+</span>
                    <h3 class="text-xl md:text-2xl text-zinc-50">Penghargaan</h3>
                </div>
                <div class="h-fit py-4 px-2 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-3xl md:text-4xl font-semibold text-quarternary">723+</span>
                    <h3 class="text-xl md:text-2xl text-zinc-50">Proyek</h3>
                </div>
                <div class="h-fit py-4 px-2 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-3xl md:text-4xl font-semibold text-quarternary">1300+</span>
                    <h3 class="text-xl md:text-2xl text-zinc-50">Mahasiswa/i</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Bento Grid -->
    <section class="py-8 md:py-12 lg:py-16">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mb-8 md:mb-12 text-center">
                <flux:heading size="4xl" level="2">Featured Articles</flux:heading>
                <flux:subheading size="2xl">Explore the latest industrial engineering trends, research, and insights.</flux:subheading>
            </div>

            <!-- Mobile view (1 column) visible only on smallest screens -->
            <div class="grid grid-cols-1 gap-4 md:hidden">
                <!-- Article 1 -->
                <a href="" class="bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/id/76/800/400" alt="Industry 4.0" class="w-full h-48 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-zinc-900/70"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-zinc-50">
                            <span class="bg-primary text-zinc-50 text-xs font-semibold px-2 py-1 rounded">INDUSTRY 4.0</span>
                            <h3 class="mt-2 text-lg font-bold">How Industry 4.0 is Transforming Manufacturing Processes</h3>
                        </div>
                    </div>
                </a>

                <!-- Article 2 -->
                <div class="bg-gradient-to-r from-secondary to-primary rounded-lg shadow overflow-hidden">
                    <div class="p-4 flex flex-col justify-between">
                        <div>
                            <span class="bg-zinc-50 text-primary text-xs font-semibold px-2 py-1 rounded">EVENT</span>
                            <h3 class="mt-2 text-lg font-bold text-zinc-50">Industrial Engineering National Conference 2023</h3>
                            <p class="mt-1 text-sm text-zinc-50/80">Join us for the biggest IE conference of the year</p>
                        </div>
                        <div class="flex justify-between items-center mt-4">
                            <a href="" class="px-3 py-1 bg-zinc-50 text-primary rounded font-medium text-sm">Register Now</a>
                            <div class="text-right text-zinc-50">
                                <div class="text-xl font-bold">15-17 June</div>
                                <div class="text-sm">2023</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional articles truncated for mobile -->
                <a href="" class="bg-quarternary rounded-lg shadow overflow-hidden">
                    <div class="flex flex-col">
                        <div class="h-48 overflow-hidden">
                            <img src="https://picsum.photos/id/237/400/400" alt="Research Methods" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex flex-col">
                            <span class="w-fit bg-zinc-50 text-quarternary text-xs font-semibold px-2 py-1 rounded">RESEARCH</span>
                            <h3 class="mt-2 text-base font-bold">Innovative Research Methods in Industrial Engineering</h3>
                            <div class="mt-4 pt-2 flex items-center">
                                <img class="w-6 h-6 rounded-full" src="https://picsum.photos/id/65/100" alt="Author">
                                <span class="ml-2 text-xs text-gray-600">Prof. Budi Santoso</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tablet view (2 columns) visible on medium screens -->
            <div class="hidden md:grid lg:hidden grid-cols-2 grid-rows-auto gap-4 md:gap-6">
                <!-- Article 1 -->
                <a href="" class="col-span-2 bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="relative">
                        <img src="https://picsum.photos/id/76/800/400" alt="Industry 4.0" class="w-full h-60 object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-zinc-900/70"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-zinc-50">
                            <span class="bg-primary text-zinc-50 text-xs font-semibold px-2 py-1 rounded">INDUSTRY 4.0</span>
                            <h3 class="mt-2 text-lg font-bold">How Industry 4.0 is Transforming Manufacturing Processes</h3>
                            <p class="mt-1 text-sm text-zinc-50/80 line-clamp-2">An in-depth look at how automation and data exchange are revolutionizing production systems</p>
                        </div>
                    </div>
                </a>

                <!-- Article 2 -->
                <div class="bg-gradient-to-r from-secondary to-primary rounded-lg shadow overflow-hidden">
                    <div class="h-full p-4 flex flex-col justify-between">
                        <div>
                            <span class="bg-zinc-50 text-primary text-xs font-semibold px-2 py-1 rounded">EVENT</span>
                            <h3 class="mt-2 text-lg font-bold text-zinc-50">Industrial Engineering National Conference 2023</h3>
                            <p class="mt-1 text-sm text-zinc-50/80">Join us for the biggest IE conference of the year</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="" class="px-3 py-1 bg-zinc-50 text-primary rounded font-medium text-sm">Register Now</a>
                            <div class="text-right text-zinc-50">
                                <div class="text-xl font-bold">15-17 June</div>
                                <div class="text-sm">2023</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <a href="" class="bg-quarternary rounded-lg shadow overflow-hidden">
                    <div class="flex flex-col">
                        <div class="h-48 overflow-hidden">
                            <img src="https://picsum.photos/id/237/400/400" alt="Research Methods" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 flex flex-col">
                            <span class="w-fit bg-zinc-50 text-quarternary text-xs font-semibold px-2 py-1 rounded">RESEARCH</span>
                            <h3 class="mt-2 text-base font-bold">Innovative Research Methods in Industrial Engineering</h3>
                            <div class="mt-4 pt-2 flex items-center">
                                <img class="w-6 h-6 rounded-full" src="https://picsum.photos/id/65/100" alt="Author">
                                <span class="ml-2 text-xs text-gray-600">Prof. Budi Santoso</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- YouTube Video -->
                <div class="bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg shadow-2xl aspect-video">
                        <iframe
                            class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/MkOS0xYa5qY?si=_ZNVQDB72NI-rK0I"
                            title="THIRTY TWO WONDER YEARS"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Desktop view (original layout) only visible on large screens -->
            <div class="hidden lg:grid grid-cols-4 grid-rows-4 gap-6 h-[940px] w-full">
                <!-- Article 1 -->
                <a href="" class="col-span-2 row-span-1 bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="h-full relative">
                        <img src="https://picsum.photos/id/76/800/400" alt="Industry 4.0" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-zinc-900/70"></div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 text-zinc-50">
                            <span class="bg-primary text-zinc-50 text-xs font-semibold px-2 py-1 rounded">INDUSTRY 4.0</span>
                            <h3 class="mt-2 text-lg font-bold">How Industry 4.0 is Transforming Manufacturing Processes</h3>
                            <p class="mt-1 text-sm text-zinc-50/80 line-clamp-2">An in-depth look at how automation and data exchange are revolutionizing production systems</p>
                        </div>
                    </div>
                </a>

                <!-- Article 2 -->
                <div class="col-span-2 row-span-1 bg-gradient-to-r from-secondary to-primary rounded-lg shadow overflow-hidden">
                    <div class="h-full p-4 flex flex-col justify-between">
                        <div>
                            <span class="bg-zinc-50 text-primary text-xs font-semibold px-2 py-1 rounded">EVENT</span>
                            <h3 class="mt-2 text-lg font-bold text-zinc-50">Industrial Engineering National Conference 2023</h3>
                            <p class="mt-1 text-sm text-zinc-50/80">Join us for the biggest IE conference of the year</p>
                        </div>
                        <div class="flex justify-between items-center">
                            <a href="" class="px-3 py-1 bg-zinc-50 text-primary rounded font-medium text-sm">Register Now</a>
                            <div class="text-right text-zinc-50">
                                <div class="text-xl font-bold">15-17 June</div>
                                <div class="text-sm">2023</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Article 3 -->
                <a href="" class="col-span-1 row-span-4 bg-quarternary rounded-lg shadow overflow-hidden">
                    <div class="h-full flex flex-col">
                        <div class="h-1/2 overflow-hidden">
                            <img src="https://picsum.photos/id/237/400/400" alt="Research Methods" class="w-full h-full object-cover">
                        </div>
                        <div class="h-1/2 p-4 flex flex-col">
                            <span class="w-fit bg-zinc-50 text-quarternary text-xs font-semibold px-2 py-1 rounded">RESEARCH</span>
                            <h3 class="mt-2 text-base font-bold">Innovative Research Methods in Industrial Engineering</h3>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-3">Exploring new approaches to research that are changing how we solve complex industrial problems</p>
                            <div class="mt-auto pt-2 flex items-center">
                                <img class="w-6 h-6 rounded-full" src="https://picsum.photos/id/65/100" alt="Author">
                                <span class="ml-2 text-xs text-gray-600">Prof. Budi Santoso</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Article 4 -->
                <div class="col-span-2 row-span-2 bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="relative overflow-hidden rounded-lg shadow-2xl aspect-video">
                        <!-- YouTube embed with responsive iframe -->
                        <iframe
                            class="absolute inset-0 w-full h-full"
                            src="https://www.youtube.com/embed/MkOS0xYa5qY?si=_ZNVQDB72NI-rK0I"
                            title="THIRTY TWO WONDER YEARS"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>

                <!-- Article 5 -->
                <a href="" class="col-span-1 row-span-2 bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="h-full flex flex-col">
                        <div class="h-1/2 overflow-hidden">
                            <img src="https://picsum.photos/id/99/400/200" alt="IoT" class="w-full h-full object-cover">
                        </div>
                        <div class="h-1/2 p-4 flex flex-col">
                            <span class="w-fit bg-gray-200 text-gray-800 text-xs font-semibold px-2 py-1 rounded">IOT</span>
                            <h3 class="mt-2 text-base font-bold">IoT Applications in Production Systems</h3>
                            <p class="mt-1 text-xs text-gray-600 line-clamp-2">Real-world examples of Internet of Things in modern factories</p>
                            <div class="mt-auto text-xs text-gray-500">
                                <span>March 5, 2023</span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Article 6 -->
                <div class="col-span-3 row-span-2 bg-zinc-50 rounded-lg shadow overflow-hidden">
                    <div class="h-full flex flex-col md:flex-row">
                        <div class="w-full md:w-2/3 p-4 flex flex-col">
                            <span class="w-fit bg-gray-200 text-gray-800 text-xs font-semibold px-2 py-1 rounded">INDUSTRY INSIGHTS</span>
                            <h3 class="mt-2 text-xl font-bold">The State of Industrial Engineering in Indonesia 2023</h3>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">A comprehensive analysis of trends, challenges, and opportunities in the Indonesian industrial engineering landscape</p>

                            <div class="mt-4 grid grid-cols-3 gap-3">
                                <!-- Articles Bento Grid (continued) -->
                                <div class="text-center p-2 bg-gray-100 rounded">
                                    <div class="text-lg font-bold text-primary">27%</div>
                                    <div class="text-xs text-gray-600">Growth in Job Market</div>
                                </div>
                                <div class="text-center p-2 bg-gray-100 rounded">
                                    <div class="text-lg font-bold text-primary">85+</div>
                                    <div class="text-xs text-gray-600">Universities Offering IE</div>
                                </div>
                                <div class="text-center p-2 bg-gray-100 rounded">
                                    <div class="text-lg font-bold text-primary">IDR 12.4M</div>
                                    <div class="text-xs text-gray-600">Average Starting Salary</div>
                                </div>
                            </div>

                            <div class="mt-auto pt-2 flex items-center justify-between">
                                <span class="text-xs text-gray-600">IE Research Team</span>
                                <a href="#" class="text-primary text-sm font-medium">Download Report →</a>
                            </div>
                        </div>
                        <div class="w-full md:w-1/3 h-48 md:h-auto overflow-hidden">
                            <img src="https://picsum.photos/id/180/300/400" alt="Industry Report" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 md:mt-12 text-center">
                <a href="" class="inline-flex items-center rounded-md border border-primary bg-zinc-50 px-4 py-2 md:px-6 md:py-3 text-sm md:text-base font-medium text-primary hover:bg-primary hover:text-zinc-50 transition">
                    View all articles
                    <svg class="ml-2 h-4 w-4 md:h-5 md:w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Video Profil Section -->
    <section class="py-8 md:py-12 lg:py-16 bg-zinc-900">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <flux:heading size="4xl" level="2" accent="disableDarkMode">Watch Our Video</flux:heading>
                <flux:subheading size="2xl" accent="disableDarkMode">Learn about our association's history, mission, and impact on industrial engineering students.</flux:subheading>
            </div>

            <div class="max-w-7xl mx-auto">
                <div class="relative overflow-hidden rounded-lg shadow-2xl aspect-video">
                    <!-- YouTube embed with responsive iframe -->
                    <iframe
                        class="absolute inset-0 w-full h-full"
                        src="https://www.youtube.com/embed/MkOS0xYa5qY?si=_ZNVQDB72NI-rK0I"
                        title="THIRTY TWO WONDER YEARS"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="mt-6 md:mt-8 flex justify-center">
                    <a href="https://www.youtube.com/@HMTITelkomUniversity" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center space-x-1 md:space-x-2 rounded-full bg-secondary px-4 py-2 md:px-6 md:py-3 text-sm md:text-base text-zinc-50 hover:bg-primary transition">
                        <svg class="h-4 w-4 md:h-5 md:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                        <span class="whitespace-nowrap">Subscribe to our YouTube channel</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
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
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="text-center md:text-left max-w-lg mx-auto md:mx-0">
                    <h2 class="text-2xl sm:text-3xl font-bold tracking-tight text-zinc-50 md:text-4xl">
                        <span class="block">Ready to join maroon army?</span>
                        <span class="block text-tertiary mt-1">Become a member today!</span>
                    </h2>
                </div>
                <div class="mt-6 md:mt-0 flex flex-col sm:flex-row justify-center md:justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                    <div class="rounded-md shadow w-full sm:w-auto">
                        <a href="#" class="flex items-center justify-center rounded-md bg-zinc-50 px-6 py-3 text-sm sm:text-base font-medium text-primary hover:bg-zinc-100 md:py-3 md:px-8 lg:py-4 lg:px-10 w-full sm:w-auto">
                            Apply for Membership
                        </a>
                    </div>
                    <div class="rounded-md shadow w-full sm:w-auto">
                        <a href="#" class="flex items-center justify-center rounded-md bg-quarternary/90 px-6 py-3 text-sm sm:text-base font-medium text-zinc-50 hover:bg-quarternary md:py-3 md:px-8 lg:py-4 lg:px-10 w-full sm:w-auto">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
