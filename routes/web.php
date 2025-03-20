<?php

use Livewire\Volt\Volt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::controller(MainController::class)->group(function () {

    // Home Route
    Route::get('/', 'index')->name('home');

    // Profil Routes
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('tentang-kami', 'tentangKami')->name('tentang-kami');
        Route::get('ad-art', 'adArt')->name('ad-art');
        Route::get('panduan-logo-hmti', 'panduanLogo')->name('panduan-logo');
        Route::get('grand-design-hmti-2025', 'grandDesign')->name('grand-design');
        Route::get('hut-hmti', 'hut')->name('hut');
        Route::get('sejarah-hmti', 'sejarah')->name('sejarah');
    });

    // Departemen & Biro Routes
    Route::prefix('departemen-biro')->name('departemen-biro.')->group(function () {
        Route::get('{division}/{slug}', 'showDepartemenBiro')
            ->where('division', 'internal|psti|eksternal')
            ->name('show');
    });

    // Community & Committee Routes
    Route::prefix('community-committee')->name('community-committee.')->group(function () {
        Route::get('{category}/{slug}', 'showCommunityCommittee')
            ->where('category', 'community|committee')
            ->name('show');
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

Route::middleware(['auth', 'can:access dashboard'])->group(function () {

    Route::view('dashboard', 'dashboard.index')->name('dashboard');

    Route::prefix('dashboard')->name('dashboard.')->group(function (){

        Route::prefix('admin')->name('admin.')->group(function (){

            Route::view('manage-user', 'dashboard.admin.user')
                ->name('user')
                ->middleware('can:manage users');

            Route::view('manage-role', 'dashboard.admin.role')
                ->name('role')
                ->middleware('can:manage roles');
        });

        Route::view('departemen-biro', 'dashboard.departemen-biro')->name('departemen-biro');

        Route::view('community-committee', 'dashboard.community-committee')->name('community-committee');
    });

    Route::redirect('settings', 'settings/profil');

    Volt::route('settings/profil', 'settings.profil')->name('settings.profil');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
