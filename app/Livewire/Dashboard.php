<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\DepartemenBiro;
use App\Models\CommunityCommittee;
use App\Models\Inti;
use App\Models\Anggota;
use App\Models\ProgramKerja;
use App\Models\Agenda;
use App\Models\Fungsi;
use App\Models\AdArt;
use App\Models\TentangKami;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public function render()
    {
        // Get statistics
        $stats = [
            'total_users' => User::count(),
            'total_departemen' => DepartemenBiro::count(),
            'total_community_committee' => CommunityCommittee::count(),
            'total_inti' => Inti::count(),
            'total_anggota' => Anggota::count(),
            'total_program_kerja' => ProgramKerja::count(),
            'total_agenda' => Agenda::count(),
            'total_fungsi' => Fungsi::count(),
        ];

        // Departemen by divisi
        $departemenByDivisi = DepartemenBiro::select('divisi', DB::raw('count(*) as total'))
            ->groupBy('divisi')
            ->get();

        // Community vs Committee
        $communityCommitteeStats = CommunityCommittee::select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        // Recent activities (latest created records)
        $recentDepartemen = DepartemenBiro::latest()->take(5)->get();
        $recentCommunity = CommunityCommittee::latest()->take(5)->get();
        $recentAnggota = Anggota::with('departemenBiro')->latest()->take(5)->get();

        // Inti positions breakdown
        $intiByPosition = Inti::select('position', DB::raw('count(*) as total'))
            ->groupBy('position')
            ->get();

        // Active vs inactive anggota (current year)
        $currentYear = now()->year;
        $activeAnggota = Anggota::where('tahun_mulai', '<=', $currentYear)
            ->where(function($query) use ($currentYear) {
                $query->whereNull('tahun_selesai')
                      ->orWhere('tahun_selesai', '>=', $currentYear);
            })->count();

        $inactiveAnggota = Anggota::where('tahun_selesai', '<', $currentYear)
            ->whereNotNull('tahun_selesai')
            ->count();

        // System info
        $systemInfo = [
            'has_ad_art' => AdArt::exists(),
            'has_tentang_kami' => TentangKami::exists(),
            'last_updated' => max(
                DepartemenBiro::max('updated_at'),
                CommunityCommittee::max('updated_at'),
                Inti::max('updated_at')
            ),
        ];

        return view('livewire.dashboard', compact(
            'stats',
            'departemenByDivisi', 
            'communityCommitteeStats',
            'recentDepartemen',
            'recentCommunity',
            'recentAnggota',
            'intiByPosition',
            'activeAnggota',
            'inactiveAnggota',
            'systemInfo'
        ));
    }
}