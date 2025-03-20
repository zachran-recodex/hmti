<flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <a href="{{ route('home') }}" class="w-full flex items-center justify-center">
        <img class="w-auto h-20" src="{{ asset('images/logo_hmti.jpg') }}" alt="HMTI Logo">
    </a>

    <flux:navlist variant="outline">
        <flux:navlist.group heading="Profil" expandable expanded="false">
            <flux:navlist.item href="{{ route('profil.tentang-kami') }}">Tentang Kami</flux:navlist.item>
            <flux:navlist.item href="{{ route('profil.ad-art') }}">AD/ART</flux:navlist.item>
            <flux:navlist.item href="{{ route('profil.panduan-logo') }}">Panduan Logo HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profil.grand-design') }}">Grand Design HMTI 2025</flux:navlist.item>
            <flux:navlist.item href="{{ route('profil.hut') }}">HUT HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profil.sejarah') }}">Sejarah HMTI</flux:navlist.item>
        </flux:navlist.group>

        <flux:navlist.group heading="Departemen & Biro" expandable expanded="false">
            <flux:navlist.group heading="Internal" expandable expanded="false">
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-human-resource']) }}" textWrap="true">
                    Departemen Human Resource
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-kaderisasi']) }}" textWrap="true">
                    Departemen Kaderisasi
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'internal', 'slug' => 'departemen-kemahasiswaan']) }}" textWrap="true">
                    Departemen Kemahasiswaan
                </flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="PSTI" expandable expanded="false">
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-akademik']) }}" textWrap="true">
                    Departemen Akademik
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-generasi-bisnis']) }}" textWrap="true">
                    Departemen Generasi Bisnis
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'psti', 'slug' => 'departemen-riset-kompetisi']) }}" textWrap="true">
                    Departemen Riset & Kompetisi
                </flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="Eksternal" expandable expanded="false">
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'departemen-komunikasi-informasi']) }}" textWrap="true">
                    Departemen Komunikasi & Informasi
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'biro-dedikasi-masyarakat']) }}" textWrap="true">
                    Biro Dedikasi Masyarakat
                </flux:navlist.item>
                <flux:navlist.item href="{{ route('departemen-biro.show', ['division' => 'eksternal', 'slug' => 'biro-public-relation']) }}" textWrap="true">
                    Biro Public Relation
                </flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist.group>

        <flux:navlist.group heading="Community & Committee" expandable expanded="false">
            <flux:navlist.group heading="Community" expandable expanded="false">
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'incoustic']) }}">Incoustic</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'industrial-competition-community']) }}">Industrial Competition Community</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'koma-creative']) }}">Koma Creative</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'maroon-army']) }}">Maroon Army</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'community-motor-telkom-university']) }}">Community Motor Telkom University</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'community-of-tentor']) }}">Community of Tentor</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'community', 'slug' => 'society']) }}">Society</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="Committee" expandable expanded="false">
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'invention']) }}">Invention</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'sehati']) }}">SEHATI</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'legion']) }}">LEGION</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'increase']) }}">Increase</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'inaugurasi']) }}">Inaugurasi</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'orations']) }}">ORATIONS</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.show', ['category' => 'committee', 'slug' => 'infade']) }}">INFADE</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist.group>

        <flux:navlist.group heading="Sensecurrency" expandable expanded="false">
            <flux:navlist.group heading="Produk" expandable expanded="false">
                <flux:navlist.item href="{{ route('sensecurrency.produk.merchandise') }}" textWrap="true">Maroon Merchandise</flux:navlist.item>
                <flux:navlist.item href="{{ route('sensecurrency.produk.jacket') }}" textWrap="true">Jacket</flux:navlist.item>
                <flux:navlist.item href="{{ route('sensecurrency.produk.shirt') }}" textWrap="true">Shirt</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group heading="Officially Maroon" expandable expanded="false">
                <flux:navlist.item href="{{ route('sensecurrency.officially-maroon.order') }}" textWrap="true">Order & Pre-Order</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist.group>

        <flux:navlist.group heading="Partnership" expandable expanded="false">
            <flux:navlist.item href="{{ route('partnership.benchmark') }}">Benchmark</flux:navlist.item>
            <flux:navlist.item href="{{ route('partnership.media-partner') }}">Media Partner</flux:navlist.item>
            <flux:navlist.item href="{{ route('partnership.mc-moderator') }}">MC & Moderator</flux:navlist.item>
        </flux:navlist.group>

        <flux:navlist.group heading="MPM" expandable expanded="false">
            <flux:navlist.item href="{{ route('mpm.komisi-a') }}">Komisi A</flux:navlist.item>
            <flux:navlist.item href="{{ route('mpm.komisi-b') }}">Komisi B</flux:navlist.item>
            <flux:navlist.item href="{{ route('mpm.burt') }}">BURT</flux:navlist.item>
        </flux:navlist.group>

    </flux:navlist>

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item icon="cog-6-tooth" href="#">Settings</flux:navlist.item>
        <flux:navlist.item icon="information-circle" href="#">Help</flux:navlist.item>
    </flux:navlist>
</flux:sidebar>
