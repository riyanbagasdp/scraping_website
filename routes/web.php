<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('home');
});

Route::get('/scrape/scopus', [ScrapingController::class, 'scrapeScopus']);
Route::get('/scrape/scholar', [ScrapingController::class, 'scrapeScholar']);
Route::get('/scrape/tes', [ScrapingController::class, 'scrapePublications']);

// Route::get('/', [ArtikelController::class, 'index']);
Route::resource('artikel', ArtikelController::class);