<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
        <flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('dashboard') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
                <x-app-logo class="size-8" href="#"></x-app-logo>
            </a>

            <flux:navlist variant="outline">

                <!-- Theme Switcher -->
                <flux:radio.group variant="segmented" x-model="$flux.appearance" class="mx-4 mb-4">
                    <flux:radio value="light" icon="sun" />
                    <flux:radio value="dark" icon="moon" />
                </flux:radio.group>

                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>Dashboard</flux:navlist.item>

                @if(auth()->user()->hasRole(['admin', 'super-admin']))
                    <flux:navlist.group expandable heading="Admin">
                        @can('manage users')
                            <flux:navlist.item icon="users" :href="route('dashboard.admin.user')" :current="request()->routeIs('dashboard.admin.user')" wire:navigate>Manage User</flux:navlist.item>
                        @endcan

                        @can('manage roles')
                            <flux:navlist.item icon="shield-check" :href="route('dashboard.admin.role')" :current="request()->routeIs('dashboard.admin.role')" wire:navigate>Manage Role</flux:navlist.item>
                        @endcan
                    </flux:navlist.group>
                @endif

                <flux:navlist.group heading="Departemen & Biro" expandable>

                    <flux:navlist.item href="{{ route('dashboard.departemen-biro.internal') }}" textWrap="true">Internal</flux:navlist.item>

                    <flux:navlist.item href="{{ route('dashboard.departemen-biro.internal') }}" textWrap="true">PSTI</flux:navlist.item>

                    <flux:navlist.item href="{{ route('dashboard.departemen-biro.internal') }}" textWrap="true">Eksternal</flux:navlist.item>

                </flux:navlist.group>

                <flux:navlist.group heading="Community" expandable>
                    <flux:navlist.item href="{{ route('community-committee.community.incoustic') }}" textWrap="true">Incoustic</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.industrial-competition') }}" textWrap="true">Industrial Competition Community</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.koma-creative') }}" textWrap="true">Koma Creative</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.maroon-army') }}" textWrap="true">Maroon Army</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.motor-telkom') }}" textWrap="true">Community Motor Telkom University</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.tentor') }}" textWrap="true">Community of Tentor</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.community.society') }}" textWrap="true">Society</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Committee" expandable>
                    <flux:navlist.item href="{{ route('community-committee.committee.invention') }}" textWrap="true">Invention</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.sehati') }}" textWrap="true">SEHATI</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.legion') }}" textWrap="true">LEGION</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.increase') }}" textWrap="true">Increase</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.inaugurasi') }}" textWrap="true">Inaugurasi</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.orations') }}" textWrap="true">ORATIONS</flux:navlist.item>
                    <flux:navlist.item href="{{ route('community-committee.committee.infade') }}" textWrap="true">INFADE</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="Sensecurrency" expandable>
                    <flux:navlist.group heading="Produk" expandable>
                        <flux:navlist.item href="{{ route('sensecurrency.produk.merchandise') }}" textWrap="true">Maroon Merchandise</flux:navlist.item>
                        <flux:navlist.item href="{{ route('sensecurrency.produk.jacket') }}" textWrap="true">Jacket</flux:navlist.item>
                        <flux:navlist.item href="{{ route('sensecurrency.produk.shirt') }}" textWrap="true">Shirt</flux:navlist.item>
                    </flux:navlist.group>
                    <flux:navlist.group heading="Officially Maroon" expandable>
                        <flux:navlist.item href="{{ route('sensecurrency.officially-maroon.order') }}" textWrap="true">Order & Pre-Order</flux:navlist.item>
                    </flux:navlist.group>
                </flux:navlist.group>

                <flux:navlist.group heading="Partnership" expandable>
                    <flux:navlist.item href="{{ route('partnership.benchmark') }}">Benchmark</flux:navlist.item>
                    <flux:navlist.item href="{{ route('partnership.media-partner') }}">Media Partner</flux:navlist.item>
                    <flux:navlist.item href="{{ route('partnership.mc-moderator') }}">MC & Moderator</flux:navlist.item>
                </flux:navlist.group>

                <flux:navlist.group heading="MPM" expandable>
                    <flux:navlist.item href="{{ route('mpm.komisi-a') }}">Komisi A</flux:navlist.item>
                    <flux:navlist.item href="{{ route('mpm.komisi-b') }}">Komisi B</flux:navlist.item>
                    <flux:navlist.item href="{{ route('mpm.burt') }}">BURT</flux:navlist.item>
                </flux:navlist.group>

            </flux:navlist>
        </flux:sidebar>

        <flux:header sticky class="block! bg-white lg:bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
            <flux:navbar class="w-full">
                <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

                <flux:spacer />

                <flux:dropdown position="bottom" align="end">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevrons-up-down"
                        :role="Str::title(str_replace('-', ' ', auth()->user()->roles->first()?->name))"
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

            </flux:navbar>
        </flux:header>

        {{ $slot }}

        <livewire:notification />

        @fluxScripts
    </body>
</html>
