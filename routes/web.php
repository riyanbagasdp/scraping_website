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

// Tambah User Universitas
// ADD Dosen
Route::get('/dosenAdminUniv', [UserController::class, 'home'])->name('user.home');
Route::get('/tambahDosenUniv', [UserController::class, 'tambahDosenUniv']);
Route::post('/dosenAdminUniv', [UserController::class, 'store'])->name('user.store');
Route::get('/tambah-dosen-univ', [UserController::class, 'tambahDosenUniv'])->name('user.create');
// EDIT Dosen
Route::post('/user/{id}/update', [UserController::class, 'update'])->name('user.update');
Route::post('/editDosenUniv/{id}', [UserController::class, 'update'])->name('user.update');

// ADD Admin Fakultas 
Route::get('/adminFakulUniv', [UserController::class, 'home2'])->name('user.home2');
Route::get('/tambahAdminFakulUniv', [UserController::class, 'tambahAdminFakulUniv']);
Route::post('/adminFakulUniv', [UserController::class, 'store2'])->name('user.store2');
Route::get('/tambah-admin-fakul-univ', [UserController::class, 'tambahAdminFakulUniv'])->name('user.create');


