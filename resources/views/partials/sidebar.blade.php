<flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
    <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

    <div class="flex items-center">
        <img class="w-auto h-20" src="{{ asset('images/logo_hmti.jpg') }}" alt="HMTI Logo">
    </div>

    <flux:navlist variant="outline">
        <flux:navlist.group heading="Profile" expandable expanded="false">
            <flux:navlist.item href="{{ route('profile.tentang-kami') }}">Tentang Kami</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.visi-misi') }}">Visi Misi</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.struktur') }}">Struktur HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.inti-kepala') }}">Inti dan Kepala Depbir</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.ad-art') }}">AD/ART</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.panduan-logo') }}">Panduan Logo HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.grand-design') }}">Grand Design HMTI 2025</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.hut') }}">HUT HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.profil') }}">Profil HMTI</flux:navlist.item>
            <flux:navlist.item href="{{ route('profile.sejarah') }}">Sejarah HMTI</flux:navlist.item>
        </flux:navlist.group>

        <flux:navlist.group heading="Department/Bureau" expandable expanded="false">
            <flux:navlist.group heading="Internal" expandable expanded="false">
                <flux:navlist.item href="{{ route('department-bureau.internal.hrd') }}" textWrap="true">Human Resource Department</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.internal.kaderisasi') }}" textWrap="true">Departemen Kaderisasi</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.internal.kemahasiswaan') }}" textWrap="true">Departemen Kemahasiswaan</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="PSTI" expandable expanded="false">
                <flux:navlist.item href="{{ route('department-bureau.psti.akademik') }}" textWrap="true">Departemen Akademik</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.psti.generasi-bisnis') }}" textWrap="true">Departemen Generasi Bisnis</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.psti.riset-kompetisi') }}" textWrap="true">Departemen Riset & Kompetisi</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="External" expandable expanded="false">
                <flux:navlist.item href="{{ route('department-bureau.external.kominfo') }}" textWrap="true">Departemen Komunikasi Dan Informasi</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.external.dedikasi-masyarakat') }}" textWrap="true">Biro Dedikasi Masyarakat</flux:navlist.item>
                <flux:navlist.item href="{{ route('department-bureau.external.public-relation') }}" textWrap="true">Bureau Public Relation</flux:navlist.item>
            </flux:navlist.group>
        </flux:navlist.group>

        <flux:navlist.group heading="Community & Committee" expandable expanded="false">
            <flux:navlist.group heading="Community" expandable expanded="false">
                <flux:navlist.item href="{{ route('community-committee.community.incoustic') }}" textWrap="true">Incoustic</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.industrial-competition') }}" textWrap="true">Industrial Competition Community</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.koma-creative') }}" textWrap="true">Koma Creative</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.maroon-army') }}" textWrap="true">Maroon Army</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.motor-telkom') }}" textWrap="true">Community Motor Telkom University</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.tentor') }}" textWrap="true">Community of Tentor</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.community.society') }}" textWrap="true">Society</flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="Committee" expandable expanded="false">
                <flux:navlist.item href="{{ route('community-committee.committee.invention') }}" textWrap="true">Invention</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.sehati') }}" textWrap="true">SEHATI</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.legion') }}" textWrap="true">LEGION</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.increase') }}" textWrap="true">Increase</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.inaugurasi') }}" textWrap="true">Inaugurasi</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.orations') }}" textWrap="true">ORATIONS</flux:navlist.item>
                <flux:navlist.item href="{{ route('community-committee.committee.infade') }}" textWrap="true">INFADE</flux:navlist.item>
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
