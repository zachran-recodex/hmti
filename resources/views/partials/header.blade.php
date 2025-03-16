<flux:header sticky class="px-4 sm:px-6 lg:px-8 bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700 min-h-26 flex items-center">
    <!-- Mobile sidebar toggle - This will control your existing sidebar -->
    <flux:sidebar.toggle class="xl:hidden" icon="bars-2" inset="left" />

    <!-- Logo - smaller on mobile -->
    <div class="flex items-center">
        <img class="h-12 w-auto sm:h-16 lg:h-20" src="{{ asset('images/logo_hmti.jpg') }}" alt="HMTI Logo">
    </div>

    <flux:spacer />

    <!-- Desktop Navigation -->
    <flux:navbar class="-mb-px max-xl:hidden">
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Profile</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Tentang Kami</flux:navmenu.item>
                <flux:navmenu.item href="#">Visi Misi</flux:navmenu.item>
                <flux:navmenu.item href="#">Struktur HMTI</flux:navmenu.item>
                <flux:navmenu.item href="#">Inti dan Kepala Depbir</flux:navmenu.item>
                <flux:navmenu.item href="#">AD/ART</flux:navmenu.item>
                <flux:navmenu.item href="#">Panduan Logo HMTI</flux:navmenu.item>
                <flux:navmenu.item href="#">Grand Design HMTI 2025</flux:navmenu.item>
                <flux:navmenu.item href="#">HUT HMTI</flux:navmenu.item>
                <flux:navmenu.item href="#">Profil HMTI</flux:navmenu.item>
                <flux:navmenu.item href="#">Sejarah HMTI</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Department/Beureu</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Internal" expandable expanded="false">
                    <flux:navlist.item href="#">Human Resource Department</flux:navlist.item>
                    <flux:navlist.item href="#">Departemen Kaderisasi</flux:navlist.item>
                    <flux:navlist.item href="#">Departemen Kemahasiswaan</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group heading="PSTI" expandable expanded="false">
                    <flux:navlist.item href="#">Departemen Akademik</flux:navlist.item>
                    <flux:navlist.item href="#">Departemen Generasi Bisnis</flux:navlist.item>
                    <flux:navlist.item href="#">Departemen Riset & Kompetisi</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group heading="External" expandable expanded="false">
                    <flux:navlist.item href="#">Departemen Komunikasi Dan Informasi</flux:navlist.item>
                    <flux:navlist.item href="#">Biro Dedikasi Masyarakat</flux:navlist.item>
                    <flux:navlist.item href="#">Bureau Public Relation</flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Community & Commite</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Community" expandable expanded="false">
                    <flux:navlist.item href="#">Incoustic</flux:navlist.item>
                    <flux:navlist.item href="#">Industrial Competition Community</flux:navlist.item>
                    <flux:navlist.item href="#">Koma Creative</flux:navlist.item>
                    <flux:navlist.item href="#">Maroon Army</flux:navlist.item>
                    <flux:navlist.item href="#">Community Motor Telkom University</flux:navlist.item>
                    <flux:navlist.item href="#">Community of Tentor</flux:navlist.item>
                    <flux:navlist.item href="#">Society</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group heading="Commite" expandable expanded="false">
                    <flux:navlist.item href="#">Invention</flux:navlist.item>
                    <flux:navlist.item href="#">SEHATI</flux:navlist.item>
                    <flux:navlist.item href="#">LEGION</flux:navlist.item>
                    <flux:navlist.item href="#">Increase</flux:navlist.item>
                    <flux:navlist.item href="#">Inaugurasi</flux:navlist.item>
                    <flux:navlist.item href="#">ORATIONS</flux:navlist.item>
                    <flux:navlist.item href="#">INFADE</flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Sensecurrency</flux:navbar.item>

            <flux:navmenu>
                <flux:navlist.group heading="Produk" expandable expanded="false">
                    <flux:navlist.item href="#">Maroon Merchandise</flux:navlist.item>
                    <flux:navlist.item href="#">Jacket</flux:navlist.item>
                    <flux:navlist.item href="#">Shirt</flux:navlist.item>
                </flux:navlist.group>
                <flux:navlist.group heading="Officially Maroon" expandable expanded="false">
                    <flux:navlist.item href="#">Order & Pre-Order</flux:navlist.item>
                </flux:navlist.group>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Partnership</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Benchmark</flux:navmenu.item>
                <flux:navmenu.item href="#">Media Partner</flux:navmenu.item>
                <flux:navmenu.item href="#">MC & Moderator</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-xl:hidden">
            <flux:navbar.item icon-trailing="chevron-down">MPM</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Komisi A</flux:navmenu.item>
                <flux:navmenu.item href="#">Komisi B</flux:navmenu.item>
                <flux:navmenu.item href="#">Komisi C</flux:navmenu.item>
                <flux:navmenu.item href="#">BURT</flux:navmenu.item>
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

    <!-- User profile section -->
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
                    <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
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
