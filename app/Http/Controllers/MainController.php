<?php

namespace App\Http\Controllers;

use App\Models\DepartemenBiro;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    ## Profil
    public function tentangKami()
    {
        return view('main.profil.tentang-kami');
    }

    public function adArt()
    {
        return view('main.profil.ad-art');
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
    public function incoustic()
    {
        return view('main.community-committee.community.incoustic');
    }

    public function industrialCompetition()
    {
        return view('main.community-committee.community.industrial-competition');
    }

    public function komaCreative()
    {
        return view('main.community-committee.community.koma-creative');
    }

    public function maroonArmy()
    {
        return view('main.community-committee.community.maroon-army');
    }

    public function motorTelkom()
    {
        return view('main.community-committee.community.motor-telkom');
    }

    public function tentor()
    {
        return view('main.community-committee.community.tentor');
    }

    public function society()
    {
        return view('main.community-committee.community.society');
    }

    public function invention()
    {
        return view('main.community-committee.committee.invention');
    }

    public function sehati()
    {
        return view('main.community-committee.committee.sehati');
    }

    public function legion()
    {
        return view('main.community-committee.committee.legion');
    }

    public function increase()
    {
        return view('main.community-committee.committee.increase');
    }

    public function inaugurasi()
    {
        return view('main.community-committee.committee.inaugurasi');
    }

    public function orations()
    {
        return view('main.community-committee.committee.orations');
    }

    public function infade()
    {
        return view('main.community-committee.committee.infade');
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
