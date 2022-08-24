<?php

use App\Http\Controllers\LocalConstituenciesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Controllers\IndexController::class)->name('index');

Route::prefix('constituencies')->name('local-constituencies')->group(function () {
    Route::get('/', [LocalConstituenciesController::class, 'index'])->name('.index');
    Route::get('/{localConstituency}', [LocalConstituenciesController::class, 'view'])->name('.view');
});

/** Authentication */
Route::prefix('auth')->name('auth')->group(function () {

    /** OAuth */
    Route::prefix('oauth')->name('.oauth')->group(function () {

        /**
         * Reddit
         */
        Route::prefix('reddit')->name('.reddit')->controller(\App\Http\Controllers\Authentication\RedditOAuthController::class)->group(function () {
            Route::get('/login', 'login')->name('.login');
            Route::get('/callback', 'callback')->name('.callback');
        });
    });

    /** Development */
    if (config('app.env') == 'local') {
        Route::get('/dev/{username}', function (string $username) {
            \Illuminate\Support\Facades\Auth::login(\App\Models\User::whereUsername($username)->firstOrFail());
            return redirect()->route('site.index');
        });
    }

    /** Logout */
    Route::get('/logout', \App\Http\Controllers\Authentication\LogoutController::class)->name('.logout');
});

