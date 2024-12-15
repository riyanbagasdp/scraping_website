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
//////////////////////////////////////UNIVERSITAS//////////////////////////////////////////////
// ADD Dosen
Route::get('/dosenAdminUniv', [UserController::class, 'home'])->name('user.home');
Route::get('/tambahDosenUniv', [UserController::class, 'tambahDosenUniv']);
Route::post('/dosenAdminUniv', [UserController::class, 'store'])->name('user.store');
// EDIT Dosen
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
// DESTROY Dosen
// ============================================================================================
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// ADD Admin Fakultas 
Route::get('/adminFakulUniv', [UserController::class, 'home2'])->name('user2.home2');
Route::get('/tambahAdminFakulUniv', [UserController::class, 'tambahAdminFakulUniv']);
Route::post('/adminFakulUniv', [UserController::class, 'store2'])->name('user2.store2');
// EDIT Admin Fakultas user.
Route::get('/user2/{id}/edit2', [UserController::class, 'edit2'])->name('user2.edit2');
Route::put('/user2/{id}', [UserController::class, 'update2'])->name('user2.update2');
// DESTROY Admin Fakultas
Route::delete('/user2/{id}', [UserController::class, 'destroy2'])->name('user2.destroy2');
// ============================================================================================
// ADD Admin Prodi
Route::get('/adminProdiUniv', [UserController::class, 'home3'])->name('user3.home3');
Route::get('/tambahAdminProdiUniv', [UserController::class, 'tambahAdminProdiUniv']);
Route::post('/adminProdiUniv', [UserController::class, 'store3'])->name('user3.store3');
// EDIT Admin Prodi 
Route::get('/user3/{id}/edit3', [UserController::class, 'edit3'])->name('user3.edit3');
Route::put('/user3/{id}', [UserController::class, 'update3'])->name('user3.update3');
// DESTROY Admin Prodi
Route::delete('/user3/{id}', [UserController::class, 'destroy3'])->name('user3.destroy3');
//////////////////////////////////////FAKULTAS//////////////////////////////////////////////
// ADD Dosen
Route::get('/dosenAdminFakultas', [UserController::class, 'home4'])->name('user4.home4');
Route::get('/tambahDosenFakultas', [UserController::class, 'tambahDosenFakultas']);
Route::post('/dosenAdminFakultas', [UserController::class, 'store4'])->name('user4.store4');
// EDIT Dosen
Route::get('/user4/{id}/edit4', [UserController::class, 'edit4'])->name('user4.edit4');
Route::put('/user4/{id}', [UserController::class, 'update4'])->name('user4.update4');
// DESTROY Admin Fakultas
Route::delete('/user4/{id}', [UserController::class, 'destroy4'])->name('user4.destroy4');
// ============================================================================================
// ADD Admin Prodi
Route::get('/adminProdiFakultas', [UserController::class, 'home5'])->name('user5.home5');
Route::get('/tambahAdminProdiFakultas', [UserController::class, 'tambahAdminProdiFakultas']);
Route::post('/adminProdiFakultas', [UserController::class, 'store5'])->name('user5.store5');
// EDIT Admin Prodi 
Route::get('/user5/{id}/edit5', [UserController::class, 'edit5'])->name('user5.edit5');
Route::put('/user5/{id}', [UserController::class, 'update5'])->name('user5.update5');
// DESTROY Admin Fakultas
Route::delete('/user5/{id}', [UserController::class, 'destroy5'])->name('user5.destroy5');
//////////////////////////////////////PRODI//////////////////////////////////////////////
// ADD Dosen
Route::get('/dosenAdminProdi', [UserController::class, 'home6'])->name('user6.home6');
Route::get('/tambahDosenProdi', [UserController::class, 'tambahDosenProdi']);
Route::post('/dosenAdminProdi', [UserController::class, 'store6'])->name('user6.store6');
// EDIT Dosen
Route::get('/user6/{id}/edit6', [UserController::class, 'edit6'])->name('user6.edit6');
Route::put('/user6/{id}', [UserController::class, 'update6'])->name('user6.update6');
// DESTROY Admin Fakultas
Route::delete('/user6/{id}', [UserController::class, 'destroy6'])->name('user6.destroy6');
