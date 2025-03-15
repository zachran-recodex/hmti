<x-layouts.main>
    <!-- Hero Section with Carousel -->
    <div x-data="{
    activeSlide: 0,
    slides: [
        {
            image: 'https://picsum.photos/id/1/1920/1080',
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
         class="relative overflow-hidden bg-zinc-900 h-[70vh] rounded-4xl">
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
    <div class="relative z-10 -mt-24 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-4">
            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/surat_edaran.png') }}" alt="Surat Edaran" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/surat_kegiatan.png') }}" alt="Surat Kegiatan" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/informasi_lomba.png') }}" alt="Informasi Lomba" class="h-full w-full object-cover">
                </div>
            </a>

            <a href="" class="overflow-hidden rounded-lg bg-zinc-50 shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-105 border border-zinc-900">
                <div class="w-full h-44 overflow-hidden">
                    <img src="{{ asset('images/berita.png') }}" alt="Berita" class="h-full w-full object-cover">
                </div>
            </a>
        </div>
    </div>

    <!-- Banner Section with Association Head (Only Background Image) -->
    <section class="py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative py-64 bg-cover bg-center bg-no-repeat rounded-lg border border-zinc-900" style="background-image: url('https://picsum.photos/id/201/1920/1080');">
                <!-- No overlay, text, or other elements as requested -->
            </div>
        </div>
    </section>

    <section class="py-16 bg-zinc-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-8">
                <div class="h-fit py-4 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-4xl font-semibold text-[#ffae00]">1300+</span>
                    <h3 class="text-2xl text-zinc-50">Mahasiswa/i</h3>
                </div>
                <div class="h-fit py-4 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-4xl font-semibold text-[#ffae00]">8627+</span>
                    <h3 class="text-2xl text-zinc-50">Penghargaan</h3>
                </div>
                <div class="h-fit py-4 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-4xl font-semibold text-[#ffae00]">723+</span>
                    <h3 class="text-2xl text-zinc-50">Proyek</h3>
                </div>
                <div class="h-fit py-4 bg-gradient-to-r from-secondary to-primary rounded-lg flex flex-col justify-center items-center">
                    <span class="text-4xl font-semibold text-[#ffae00]">1300+</span>
                    <h3 class="text-2xl text-zinc-50">Mahasiswa/i</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Articles Bento Grid -->
    <section class="py-16 bg-zinc-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-12 text-center">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Featured Articles</h2>
                <p class="mt-4 text-lg text-gray-500">Explore the latest industrial engineering trends, research, and insights.</p>
            </div>

            <div class="grid grid-cols-4 grid-rows-4 gap-6 h-[800px]">
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
                <a href="" class="col-span-1 row-span-4 bg-[#ffae00] rounded-lg shadow overflow-hidden">
                    <div class="h-full flex flex-col">
                        <div class="h-1/2 overflow-hidden">
                            <img src="https://picsum.photos/id/237/400/400" alt="Research Methods" class="w-full h-full object-cover">
                        </div>
                        <div class="h-1/2 p-4 flex flex-col">
                            <span class="w-fit bg-zinc-50 text-[#ffae00] text-xs font-semibold px-2 py-1 rounded">RESEARCH</span>
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
                    <div class="h-full flex">
                        <div class="w-2/3 p-4 flex flex-col">
                            <span class="w-fit bg-gray-200 text-gray-800 text-xs font-semibold px-2 py-1 rounded">INDUSTRY INSIGHTS</span>
                            <h3 class="mt-2 text-xl font-bold">The State of Industrial Engineering in Indonesia 2023</h3>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">A comprehensive analysis of trends, challenges, and opportunities in the Indonesian industrial engineering landscape</p>

                            <div class="mt-4 grid grid-cols-3 gap-3">
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
                        <div class="w-1/3 overflow-hidden">
                            <img src="https://picsum.photos/id/180/300/400" alt="Industry Report" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('articles') }}" class="inline-flex items-center rounded-md border border-primary bg-zinc-50 px-6 py-3 text-base font-medium text-primary hover:bg-primary hover:text-zinc-50 transition">
                    View all articles
                    <svg class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Video Profile Section -->
    <section class="bg-zinc-900 py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-50 sm:text-4xl">Watch Our Video</h2>
                <p class="mt-4 text-lg text-zinc-300">Learn about our association's history, mission, and impact on industrial engineering students.</p>
            </div>

            <div class="mt-12 mx-auto max-w-7xl">
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

                <div class="mt-8 flex justify-center">
                    <a href="https://www.youtube.com/@HMTITelkomUniversity" target="_blank" rel="noopener noreferrer" class="inline-flex items-center space-x-2 rounded-full bg-secondary px-6 py-3 text-zinc-50 hover:bg-primary transition">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
                        </svg>
                        <span>Subscribe to our YouTube channel</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="bg-primary py-16 relative overflow-hidden">
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

        <div class="relative container mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-3xl font-bold tracking-tight text-zinc-50 sm:text-4xl">
                    <span class="block">Ready to join our community?</span>
                    <span class="block text-tertiary">Become a member today!</span>
                </h2>
                <div class="mt-8 flex md:mt-0">
                    <div class="rounded-md shadow">
                        <a href="#" class="flex items-center justify-center rounded-md bg-zinc-50 px-8 py-3 text-base font-medium text-primary hover:bg-zinc-100 md:py-4 md:px-10">
                            Apply for Membership
                        </a>
                    </div>
                    <div class="ml-3 rounded-md shadow">
                        <a href="#" class="flex items-center justify-center rounded-md bg-quarternary/90 px-8 py-3 text-base font-medium text-zinc-50 hover:bg-quarternary md:py-4 md:px-10">
                            Learn More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main>
