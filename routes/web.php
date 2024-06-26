<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [DashboardController::class, 'index']);

Route::prefix('/')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/city', [DashboardController::class, 'getCities']);
    Route::post('/pubs', [DashboardController::class, 'getPubs']);
    Route::post('/beers', [DashboardController::class, 'getBeers']);
    Route::post('/beerList', [DashboardController::class, 'getBeerList']);
    Route::get('/add', [ReviewController::class, 'index']);
    Route::post('/getBeerReviewForms', [ReviewController::class, 'generateReviewForms']);
    Route::post('/submitReview', [ReviewController::class, 'submitReview']);
    Route::get('/test', [DashboardController::class, 'test']);
});


