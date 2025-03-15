<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('main.index');
})->name('home');

// Basic Routes
Route::view('about', 'main.about')->name('about');
Route::view('activities', 'main.activities')->name('activities');
Route::view('news', 'main.news')->name('news');
Route::view('articles', 'main.articles')->name('articles');
Route::view('contact', 'main.contact')->name('contact');

// Profile Routes
Route::prefix('profile')->group(function () {
    Route::view('about', 'profile.about')->name('profile.about');
    Route::view('visi-misi', 'profile.visi-misi')->name('profile.visi-misi');
    Route::view('tagline', 'profile.tagline')->name('profile.tagline');
    Route::view('struktur', 'profile.struktur')->name('profile.struktur');
    Route::view('inti-kepala', 'profile.inti-kepala')->name('profile.inti-kepala');
    Route::view('adart', 'profile.adart')->name('profile.adart');
    Route::view('panduan-logo', 'profile.panduan-logo')->name('profile.panduan-logo');
    Route::view('grand-design', 'profile.grand-design')->name('profile.grand-design');
    Route::view('hut', 'profile.hut')->name('profile.hut');
    Route::view('profil', 'profile.profil')->name('profile.profil');
    Route::view('sejarah', 'profile.sejarah')->name('profile.sejarah');
    Route::view('mpm', 'profile.mpm')->name('profile.mpm');
});

// Department Routes
Route::prefix('department')->group(function () {
    // Internal Department
    Route::prefix('internal')->group(function () {
        Route::view('hrd', 'department.internal.hrd')->name('department.internal.hrd');
        Route::view('kaderisasi', 'department.internal.kaderisasi')->name('department.internal.kaderisasi');
        Route::view('kemahasiswaan', 'department.internal.kemahasiswaan')->name('department.internal.kemahasiswaan');
    });

    // PSTI Department
    Route::prefix('psti')->group(function () {
        Route::view('akademik', 'department.psti.akademik')->name('department.psti.akademik');
        Route::view('generasi-bisnis', 'department.psti.generasi-bisnis')->name('department.psti.generasi-bisnis');
        Route::view('riset-kompetisi', 'department.psti.riset-kompetisi')->name('department.psti.riset-kompetisi');
    });

    // External Department
    Route::prefix('external')->group(function () {
        Route::view('kominfo', 'department.external.kominfo')->name('department.external.kominfo');
        Route::view('dedikasi-masyarakat', 'department.external.dedikasi-masyarakat')->name('department.external.dedikasi-masyarakat');
        Route::view('public-relation', 'department.external.public-relation')->name('department.external.public-relation');
    });
});

// Community Routes
Route::prefix('community')->group(function () {
    Route::view('incoustic', 'community.incoustic')->name('community.incoustic');
    Route::view('icc', 'community.icc')->name('community.icc');
    Route::view('koma-creative', 'community.koma-creative')->name('community.koma-creative');
    Route::view('maroon-army', 'community.maroon-army')->name('community.maroon-army');
    Route::view('cmt', 'community.cmt')->name('community.cmt');
    Route::view('cot', 'community.cot')->name('community.cot');
    Route::view('society', 'community.society')->name('community.society');
});

// Committee Routes
Route::prefix('committee')->group(function () {
    Route::view('invention', 'committee.invention')->name('committee.invention');
    Route::view('sehati', 'committee.sehati')->name('committee.sehati');
    Route::view('legion', 'committee.legion')->name('committee.legion');
    Route::view('increase', 'committee.increase')->name('committee.increase');
    Route::view('inaugurasi', 'committee.inaugurasi')->name('committee.inaugurasi');
    Route::view('orations', 'committee.orations')->name('committee.orations');
    Route::view('infade', 'committee.infade')->name('committee.infade');
});

// Sensecurrency Routes
Route::prefix('sensecurrency')->group(function () {
    // Produk
    Route::prefix('produk')->group(function () {
        Route::view('merchandise', 'sensecurrency.produk.merchandise')->name('sensecurrency.produk.merchandise');
        Route::view('jacket', 'sensecurrency.produk.jacket')->name('sensecurrency.produk.jacket');
        Route::view('shirt', 'sensecurrency.produk.shirt')->name('sensecurrency.produk.shirt');
    });

    // Officially Maroon
    Route::prefix('officially')->group(function () {
        Route::view('order', 'sensecurrency.officially.order')->name('sensecurrency.officially.order');
    });
});

// Partnership Routes
Route::prefix('partnership')->group(function () {
    Route::view('benchmark', 'partnership.benchmark')->name('partnership.benchmark');
    Route::view('media-partner', 'partnership.media-partner')->name('partnership.media-partner');
    Route::view('mc-moderator', 'partnership.mc-moderator')->name('partnership.mc-moderator');
});

// MPM Routes
Route::prefix('mpm')->group(function () {
    Route::view('komisi-a', 'mpm.komisi-a')->name('mpm.komisi-a');
    Route::view('komisi-b', 'mpm.komisi-b')->name('mpm.komisi-b');
    Route::view('komisi-c', 'mpm.komisi-c')->name('mpm.komisi-c');
    Route::view('burt', 'mpm.burt')->name('mpm.burt');
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
