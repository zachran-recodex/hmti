<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('main.index');
    }

    ## Profile
    public function tentangKami()
    {
        return view('main.profile.tentang-kami');
    }

    public function visiMisi()
    {
        return view('main.profile.visi-misi');
    }

    public function struktur()
    {
        return view('main.profile.struktur');
    }

    public function intiKepala()
    {
        return view('main.profile.inti-kepala');
    }

    public function adArt()
    {
        return view('main.profile.ad-art');
    }

    public function panduanLogo()
    {
        return view('main.profile.panduan-logo');
    }

    public function grandDesign()
    {
        return view('main.profile.grand-design');
    }

    public function hut()
    {
        return view('main.profile.hut');
    }

    public function profil()
    {
        return view('main.profile.profil');
    }

    public function sejarah()
    {
        return view('main.profile.sejarah');
    }

    ## Department & Bureau
    public function hrd()
    {
        return view('main.department-bureau.internal.hrd');
    }

    public function kaderisasi()
    {
        return view('main.department-bureau.internal.kaderisasi');
    }

    public function kemahasiswaan()
    {
        return view('main.department-bureau.internal.kemahasiswaan');
    }

    public function akademik()
    {
        return view('main.department-bureau.psti.akademik');
    }

    public function generasiBisnis()
    {
        return view('main.department-bureau.psti.generasi-bisnis');
    }

    public function risetKompetisi()
    {
        return view('main.department-bureau.psti.riset-kompetisi');
    }

    public function kominfo()
    {
        return view('main.department-bureau.external.kominfo');
    }

    public function dedikasiMasyarakat()
    {
        return view('main.department-bureau.external.dedikasi-masyarakat');
    }

    public function publicRelation()
    {
        return view('main.department-bureau.external.public-relation');
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
