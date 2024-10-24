<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('home');
});

Route::get('/scrape/scopus/{scopus_id}', [ScrapingController::class, 'scrapeScopus']);
Route::get('/scrape/scholar/{scholar_id}', [ScrapingController::class, 'scrapeScholar']);

Route::get('/scrape/tes', [ScrapingController::class, 'scrapePublications']);

Route::resource('artikel', ArtikelController::class);

