<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScrapingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/scrape/scopus', [ScrapingController::class, 'scrapeScopus']);
Route::get('/scrape/scholar', [ScrapingController::class, 'scrapeScholar']);
