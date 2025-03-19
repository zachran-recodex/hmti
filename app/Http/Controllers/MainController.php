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
    public function hrd()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Human Resource')
            ->firstOrFail();

        return view('main.departemen-biro.internal.hrd', [
            'departemen' => $departemen
        ]);
    }

    public function kaderisasi()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Kaderisasi')
            ->firstOrFail();

        return view('main.departemen-biro.internal.kaderisasi', [
            'departemen' => $departemen
        ]);
    }

    public function kemahasiswaan()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Kemahasiswaan')
            ->firstOrFail();

        return view('main.departemen-biro.internal.kemahasiswaan', [
            'departemen' => $departemen
        ]);
    }

    public function akademik()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Akademik')
            ->firstOrFail();

        return view('main.departemen-biro.psti.akademik', [
            'departemen' => $departemen
        ]);
    }

    public function generasiBisnis()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Generasi Bisnis')
            ->firstOrFail();

        return view('main.departemen-biro.psti.generasi-bisnis', [
            'departemen' => $departemen
        ]);
    }

    public function risetKompetisi()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Riset & Kompetisi')
            ->firstOrFail();

        return view('main.departemen-biro.psti.riset-kompetisi', [
            'departemen' => $departemen
        ]);
    }

    public function kominfo()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Departemen Komunikasi & Informasi')
            ->firstOrFail();

        return view('main.departemen-biro.external.kominfo', [
            'departemen' => $departemen
        ]);
    }

    public function dedikasiMasyarakat()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Biro Dedikasi Masyarakat')
            ->firstOrFail();

        return view('main.departemen-biro.external.dedikasi-masyarakat', [
            'departemen' => $departemen
        ]);
    }

    public function publicRelation()
    {
        $departemen = DepartemenBiro::with(['fungsis', 'programKerjas', 'agendas', 'members'])
            ->where('title', 'Biro Public Relation')
            ->firstOrFail();

        return view('main.departemen-biro.external.public-relation', [
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
