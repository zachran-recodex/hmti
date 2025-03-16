<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::controller(MainController::class)->group(function () {

    Route::get('/', 'index')->name('home');

    // Profile Routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('tentang-kami', 'tentangKami')->name('tentang-kami');
        Route::get('visi-misi', 'visiMisi')->name('visi-misi');
        Route::get('struktur-hmti', 'struktur')->name('struktur');
        Route::get('inti-dan-kepala-depbir', 'intiKepala')->name('inti-kepala');
        Route::get('ad-art', 'adArt')->name('ad-art');
        Route::get('panduan-logo-hmti', 'panduanLogo')->name('panduan-logo');
        Route::get('grand-design-hmti-2025', 'grandDesign')->name('grand-design');
        Route::get('hut-hmti', 'hut')->name('hut');
        Route::get('profil-hmti', 'profil')->name('profil');
        Route::get('sejarah-hmti', 'sejarah')->name('sejarah');
    });

    // Department Routes
    Route::prefix('department-bureau')->name('department-bureau.')->group(function () {
        // Internal Department
        Route::prefix('internal')->name('internal.')->group(function () {
            Route::get('human-resource-department', 'hrd')->name('hrd');
            Route::get('departemen-kaderisasi', 'kaderisasi')->name('kaderisasi');
            Route::get('departemen-kemahasiswaan', 'kemahasiswaan')->name('kemahasiswaan');
        });

        // PSTI Department
        Route::prefix('psti')->name('psti.')->group(function () {
            Route::get('departemen-akademik', 'akademik')->name('akademik');
            Route::get('departemen-generasi-bisnis', 'generasiBisnis')->name('generasi-bisnis');
            Route::get('departemen-riset-kompetisi', 'risetKompetisi')->name('riset-kompetisi');
        });

        // External Department
        Route::prefix('external')->name('external.')->group(function () {
            Route::get('departemen-komunikasi-informasi', 'kominfo')->name('kominfo');
            Route::get('biro-dedikasi-masyarakat', 'dedikasiMasyarakat')->name('dedikasi-masyarakat');
            Route::get('bureau-public-relation', 'publicRelation')->name('public-relation');
        });
    });

    Route::prefix('community-committee')->name('community-committee.')->group(function () {
        // Community Routes
        Route::prefix('community')->name('community.')->group(function () {
            Route::get('incoustic', 'incoustic')->name('incoustic');
            Route::get('industrial-competition-community', 'industrialCompetition')->name('industrial-competition');
            Route::get('koma-creative', 'komaCreative')->name('koma-creative');
            Route::get('maroon-army', 'maroonArmy')->name('maroon-army');
            Route::get('community-motor-telkom-university', 'motorTelkom')->name('motor-telkom');
            Route::get('community-of-tentor', 'tentor')->name('tentor');
            Route::get('society', 'society')->name('society');
        });

        // Committee Routes
        Route::prefix('committee')->name('committee.')->group(function () {
            Route::get('invention', 'invention')->name('invention');
            Route::get('sehati', 'sehati')->name('sehati');
            Route::get('legion', 'legion')->name('legion');
            Route::get('increase', 'increase')->name('increase');
            Route::get('inaugurasi', 'inaugurasi')->name('inaugurasi');
            Route::get('orations', 'orations')->name('orations');
            Route::get('infade', 'infade')->name('infade');
        });
    });

    // Sensecurrency Routes
    Route::prefix('sensecurrency')->name('sensecurrency.')->group(function () {
        // Produk Routes
        Route::prefix('produk')->name('produk.')->group(function () {
            Route::get('maroon-merchandise', 'merchandise')->name('merchandise');
            Route::get('jacket', 'jacket')->name('jacket');
            Route::get('shirt', 'shirt')->name('shirt');
        });

        // Officially Maroon Routes
        Route::prefix('officially-maroon')->name('officially-maroon.')->group(function () {
            Route::get('order-preoder', 'order')->name('order');
        });
    });

    // Partnership Routes
    Route::prefix('partnership')->name('partnership.')->group(function () {
        Route::get('benchmark', 'benchmark')->name('benchmark');
        Route::get('media-partner', 'mediaPartner')->name('media-partner');
        Route::get('mc-moderator', 'mcModerator')->name('mc-moderator');
    });

    // MPM Routes
    Route::prefix('mpm')->name('mpm.')->group(function () {
        Route::get('komisi-a', 'komisiA')->name('komisi-a');
        Route::get('komisi-b', 'komisiB')->name('komisi-b');
        Route::get('komisi-c', 'komisiC')->name('komisi-c');
        Route::get('burt', 'burt')->name('burt');
    });

});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'can:access dashboard'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
