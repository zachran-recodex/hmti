<flux:header sticky class="px-4 sm:px-6 lg:px-8 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 min-h-26 flex items-center">
    <!-- Mobile sidebar toggle - This will control your existing sidebar -->
    <flux:sidebar.toggle class="xl:hidden" icon="bars-2" inset="left" />

    <!-- Logo - smaller on mobile -->
    <a href="{{  route('home') }}" class="flex items-center">
        <img class="sm:ms-4 w-auto h-20" src="{{ asset('images/logo_hmti.jpg') }}" alt="HMTI Logo">
    </a>

    <flux:spacer />

    <!-- Desktop Navigation -->
    <flux:navbar class="-mb-px max-xl:hidden">
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Profil</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="{{ route('profil.tentang-kami') }}">Tentang Kami</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('profil.ad-art') }}">AD/ART</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('profil.panduan-logo') }}">Panduan Logo HMTI</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('profil.grand-design') }}">Grand Design HMTI 2025</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('profil.hut') }}">HUT HMTI</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('profil.sejarah') }}">Sejarah HMTI</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Departemen & Biro</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Internal" expandable expanded="false">
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-human-resource']) }}">
                        Departemen Human Resource
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-kaderisasi']) }}">
                        Departemen Kaderisasi
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-kemahasiswaan']) }}">
                        Departemen Kemahasiswaan
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="PSTI" expandable expanded="false">
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-akademik']) }}">
                        Departemen Akademik
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-generasi-bisnis']) }}">
                        Departemen Generasi Bisnis
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-riset-kompetisi']) }}">
                        Departemen Riset & Kompetisi
                    </flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Eksternal" expandable expanded="false">
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'departemen-komunikasi-informasi']) }}">
                        Departemen Komunikasi & Informasi
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'biro-dedikasi-masyarakat']) }}">
                        Biro Dedikasi Masyarakat
                    </flux:navlist.item>
                    <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'biro-public-relation']) }}">
                        Biro Public Relation
                    </flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Community & Committee</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Community" expandable expanded="false">
                    <flux:navlist.item href="{{ route('community-committee.community.incoustic') }}">Incoustic</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.industrial-competition') }}">Industrial Competition Community</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.koma-creative') }}">Koma Creative</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.maroon-army') }}">Maroon Army</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.motor-telkom') }}">Community Motor Telkom University</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.tentor') }}">Community of Tentor</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.society') }}">Society</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Committee" expandable expanded="false">
                    <flux:navlist.item href="{{ route('community-committee.committee.invention') }}">Invention</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.sehati') }}">SEHATI</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.legion') }}">LEGION</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.increase') }}">Increase</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.inaugurasi') }}">Inaugurasi</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.orations') }}">ORATIONS</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.infade') }}">INFADE</flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>

        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Sensecurrency</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Produk" expandable expanded="false">
                    <flux:navlist.item href="{{ route('sensecurrency.produk.merchandise') }}">Maroon Merchandise</flux:navlist.item>
                    <flux:navlist.item href="{{ route('sensecurrency.produk.jacket') }}">Jacket</flux:navlist.item>
                    <flux:navlist.item href="{{ route('sensecurrency.produk.shirt') }}">Shirt</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group heading="Officially Maroon" expandable expanded="false">
                    <flux:navlist.item href="{{ route('sensecurrency.officially-maroon.order') }}">Order & Pre-Order</flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>
        </flux:dropdown>

        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Partnership</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="{{ route('partnership.benchmark') }}">Benchmark</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('partnership.media-partner') }}">Media Partner</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('partnership.mc-moderator') }}">MC & Moderator</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>

        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">MPM</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="{{ route('mpm.komisi-a') }}">Komisi A</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('mpm.komisi-b') }}">Komisi B</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('mpm.komisi-c') }}">Komisi C</flux:navmenu.item>
                <flux:navmenu.item href="{{ route('mpm.burt') }}">BURT</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
    </flux:navbar>

    <flux:spacer />

    <!-- Theme toggle -->
    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance" class="hidden mx-2 sm:mx-4 md:flex">
        <flux:radio value="light" icon="sun" class="cursor-pointer!"></flux:radio>
        <flux:radio value="dark" icon="moon" class="cursor-pointer!"></flux:radio>
    </flux:radio.group>

    <flux:separator vertical variant="subtle" class="my-2 mx-2 sm:mx-4 hidden sm:block"/>

    <!-- User profil section -->
    @auth
        <flux:dropdown position="top" align="end">
            <flux:profile
                :avatar="Storage::url(auth()->user()->photo)"
                :name="auth()->user()->name"
                class="border border-zinc-200 dark:border-zinc-700"
                :role="Str::title(str_replace('-', ' ', auth()->user()->roles->first()?->name))"
                icon-trailing="chevron-down"
            />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="{{ route('dashboard') }}" icon="computer-desktop" wire:navigate>Dashboard</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="/settings/profil" icon="cog" wire:navigate>Settings</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        Log Out
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    @else
        <!-- Responsive login button -->
        <flux:button variant="primary" href="{{ route('login') }}" icon="arrow-right-end-on-rectangle">
            Login
        </flux:button>
    @endauth
</flux:header>
