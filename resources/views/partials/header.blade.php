<flux:header sticky class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

    <flux:brand href="#" logo="{{ asset('images/logo_hmti.jpg') }}" class="max-lg:hidden dark:hidden" />
    <flux:brand href="#" logo="{{ asset('images/logo_hmti.jpg') }}" class="max-lg:hidden! hidden dark:flex" />

    <flux:spacer />

    <flux:navbar class="-mb-px max-lg:hidden">
        <flux:dropdown class="max-lg:hidden">
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
        <flux:dropdown class="max-lg:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Department/Beureu</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Internal</flux:navmenu.item>
                <flux:navmenu.item href="#">PSTI</flux:navmenu.item>
                <flux:navmenu.item href="#">External</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-lg:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Community & Commite</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Community</flux:navmenu.item>
                <flux:navmenu.item href="#">Commite</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-lg:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Sensecurrency</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Produk</flux:navmenu.item>
                <flux:navmenu.item href="#">Officially Maroon</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-lg:hidden">
            <flux:navbar.item icon-trailing="chevron-down">Partnership</flux:navbar.item>

            <flux:navmenu>
                <flux:navmenu.item href="#">Benchmark</flux:navmenu.item>
                <flux:navmenu.item href="#">Media Partner</flux:navmenu.item>
                <flux:navmenu.item href="#">MC & Moderator</flux:navmenu.item>
            </flux:navmenu>
        </flux:dropdown>
        <flux:dropdown class="max-lg:hidden">
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

    <flux:radio.group x-data variant="segmented" x-model="$flux.appearance" class="me-4">
        <flux:radio value="light" icon="sun"></flux:radio>
        <flux:radio value="dark" icon="moon"></flux:radio>
    </flux:radio.group>

    <flux:separator vertical variant="subtle" class="my-2 me-4"/>

    @auth
        <flux:dropdown position="top" align="end">
            <flux:profile
                :avatar="Storage::url(auth()->user()->photo)"
                :name="auth()->user()->name"
                :role="Str::title(str_replace('-', ' ', auth()->user()->roles->first()?->name))"
                icon-trailing="chevron-down"
                class="border! border-zinc-200! dark:border-zinc-700!"
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
        <flux:button variant="primary" href="{{ route('login') }}" icon="arrow-right-end-on-rectangle">
            Login
        </flux:button>
    @endauth
</flux:header>
