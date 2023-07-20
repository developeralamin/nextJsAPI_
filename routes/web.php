<?php

use App\Http\Controllers\LessonController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;


Route::get('/{lang}', function ($lang = null) {
    App::setLocale($lang);
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cache', function () {
  // Create cusom Facade
    Twite::substruction();
});


/**
 * Stripe
 */
Route::get('/stripe', [StripePaymentController::class, 'index']);
Route::post('/stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');

Route::get('jobs', [LessonController::class, 'index']);


