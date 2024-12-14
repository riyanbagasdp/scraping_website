<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GraphicController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/scrape/scopus/{scopus_id}', [ScrapingController::class, 'scrapeScopus']);
Route::get('/scrape/scholar/{scholar_id}', [ScrapingController::class, 'scrapeScholar']);

Route::get('/scrape/tes', [ScrapingController::class, 'scrapePublications']);

Route::resource('artikel', ArtikelController::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[AdminController::class, 'index'])->name('home');
Route::get('/graphic', [GraphicController::class, 'index'])->name('home');

// UNIVERSITAS
// ADD Dosen
Route::get('/dosenAdminUniv', [UserController::class, 'home'])->name('user.home');
Route::get('/tambahDosenUniv', [UserController::class, 'tambahDosenUniv']);
Route::post('/dosenAdminUniv', [UserController::class, 'store'])->name('user.store');
// Route::get('/tambah-dosen-univ', [UserController::class, 'tambahDosenUniv'])->name('user.create');

// ADD Admin Fakultas 
Route::get('/adminFakulUniv', [UserController::class, 'home2'])->name('user.home2');
Route::get('/tambahAdminFakulUniv', [UserController::class, 'tambahAdminFakulUniv']);
Route::post('/adminFakulUniv', [UserController::class, 'store2'])->name('user.store2');
// Route::get('/tambah-admin-fakul-univ', [UserController::class, 'tambahAdminFakulUniv'])->name('user.create');

// ADD Admin Prodi
Route::get('/adminProdiUniv', [UserController::class, 'home3'])->name('user.home3');
Route::get('/tambahAdminProdiUniv', [UserController::class, 'tambahAdminProdiUniv']);
Route::post('/adminProdiUniv', [UserController::class, 'store3'])->name('user.store3');
// Route::get('/tambah-admin-prodi-univ', [UserController::class, 'tambahAdminProdiUniv'])->name('user.create');

// FAKULTAS
// ADD Dosen
Route::get('/dosenAdminFakultas', [UserController::class, 'home4'])->name('user.home4');
Route::get('/tambahDosenFakultas', [UserController::class, 'tambahDosenFakultas']);
Route::post('/dosenAdminFakultas', [UserController::class, 'store4'])->name('user.store4');

// ADD Admin Fakultas
Route::get('/adminProdiFakultas', [UserController::class, 'home5'])->name('user.home5');
Route::get('/tambahAdminProdiFakultas', [UserController::class, 'tambahAdminProdiFakultas']);
Route::post('/adminProdiFakultas', [UserController::class, 'store5'])->name('user.store5');

// PRODI
// ADD Dosen
Route::get('/dosenAdminProdi', [UserController::class, 'home6'])->name('user.home6');
Route::get('/tambahDosenProdi', [UserController::class, 'tambahDosenProdi']);
Route::post('/dosenAdminProdi', [UserController::class, 'store6'])->name('user.store6');
