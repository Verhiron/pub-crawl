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
    //get the home page - country selector
    Route::get('/', [DashboardController::class, 'index']);
    Route::post('/beers', [DashboardController::class, 'getBeers']);
    Route::post('/filterPubs', [DashboardController::class, 'getPubs']);
    Route::post('/pubList', [DashboardController::class, 'getPubListView']);

    Route::get('testFilterPubs', [DashboardController::class, 'testFilterPubs']);



    //get the add review views + filtering city/pubs
    Route::get('/add', [ReviewController::class, 'index']);
    Route::post('/city', [ReviewController::class, 'getCities']);
    Route::post('/pubs', [ReviewController::class, 'getPubs']);
    Route::post('/beerList', [ReviewController::class, 'getBeerList']);


    Route::post('/getBeerReviewForms', [ReviewController::class, 'generateReviewForms']);
    Route::post('/submitReview', [ReviewController::class, 'submitReview']);
    Route::post('/testBeer', [ReviewController::class, 'testBeer']);


});



//fetch the details from the selected country
Route::prefix('/country/')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/{country}', [DashboardController::class, 'getCitiesMainDetails']);
});

//TODO: make a route for reviews - which shows a complete list of the reviews

Route::prefix('/review/')->group(function () {
    Route::get('/{reference}', [ReviewController::class, 'getOverallReview'])->name('reviews.show');
});


