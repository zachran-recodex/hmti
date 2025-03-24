<?php

namespace App\Http\Controllers;

use App\Models\AdArt;
use App\Models\TentangKami;
use App\Models\DepartemenBiro;
use App\Models\CommunityCommittee;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    ## Profil
    public function tentangKami()
    {
        $tentang = TentangKami::first();

        return view('main.profil.tentang-kami', compact('tentang'));
    }

    public function adArt()
    {
        $adArt = AdArt::first();

        return view('main.profil.ad-art', compact('adArt'));
    }

    public function panduanLogo()
    {
        return view('main.profil.panduan-logo');
    }

    public function grandDesign()
    {
        return view('main.profil.grand-design');
    }

    public function hut()
    {
        return view('main.profil.hut');
    }

    public function sejarah()
    {
        return view('main.profil.sejarah');
    }

    ## Departemen & Biro
    public function showDepartemenBiro($division, $slug)
    {
        $titleMap = [
            'departemen-human-resource' => 'Departemen Human Resource',
            'departemen-kaderisasi' => 'Departemen Kaderisasi',
            'departemen-kemahasiswaan' => 'Departemen Kemahasiswaan',
            'departemen-akademik' => 'Departemen Akademik',
            'departemen-generasi-bisnis' => 'Departemen Generasi Bisnis',
            'departemen-riset-kompetisi' => 'Departemen Riset & Kompetisi',
            'departemen-komunikasi-informasi' => 'Departemen Komunikasi & Informasi',
            'biro-dedikasi-masyarakat' => 'Biro Dedikasi Masyarakat',
            'biro-public-relation' => 'Biro Public Relation'
        ];

        $title = $titleMap[$slug] ?? abort(404);

        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', $title)
            ->where('division', ucfirst($division))
            ->firstOrFail();

        return view('main.departemen-biro', [
            'departemen' => $departemen
        ]);
    }

    ## Community & Committee
    public function showCommunityCommittee($category, $slug)
    {
        $titleMap = [
            'incoustic' => 'Incoustic',
            'industrial-competition-community' => 'Industrial Competition Community',
            'koma-creative' => 'Koma Creative',
            'maroon-army' => 'Maroon Army',
            'community-motor-telkom-university' => 'Community Motor Telkom University',
            'community-of-tentor' => 'Community of Tentor',
            'society' => 'Society',
            'invention' => 'Invention',
            'sehati' => 'SEHATI',
            'legion' => 'LEGION',
            'increase' => 'Increase',
            'inaugurasi' => 'Inaugurasi',
            'orations' => 'ORATIONS',
            'infade' => 'INFADE'
        ];

        $title = $titleMap[$slug] ?? abort(404);

        $communityCommittee = CommunityCommittee::where('title', $title)
            ->where('category', ucfirst($category))
            ->firstOrFail();

        return view('main.community-committee', [
            'communityCommittee' => $communityCommittee
        ]);
    }

    ## Sensecurrency
    public function merchandise()
    {
        return view('main.sensecurrency.produk.maroon-merchandise');
    }

    public function jacket()
    {
        return view('main.sensecurrency.produk.jacket');
    }

    public function shirt()
    {
        return view('main.sensecurrency.produk.shirt');
    }

    public function order()
    {
        return view('main.sensecurrency.officially-maroon.order-preorder');
    }

    ## Partnership
    public function benchmark()
    {
        return view('main.partnership.benchmark');
    }

    public function mediaPartner()
    {
        return view('main.partnership.media-partner');
    }

    public function mcModerator()
    {
        return view('main.partnership.mc-moderator');
    }

    ## MPM
    public function komisiA()
    {
        return view('main.mpm.komisi-a');
    }

    public function komisiB()
    {
        return view('main.mpm.komisi-b');
    }

    public function komisiC()
    {
        return view('main.mpm.komisi-c');
    }

    public function burt()
    {
        return view('main.mpm.burt');
    }
}
