<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CadreController;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ClasseController;
use App\Http\Controllers\Admin\CorpsController;
use App\Http\Controllers\Admin\EchelonController;
use App\Http\Controllers\Admin\MentionController;
use App\Http\Controllers\Admin\MinistereController;
use App\Http\Controllers\Admin\NatureController;
use App\Http\Controllers\Admin\PositionController;
use App\Http\Controllers\Admin\RegimeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/dashbord', [AdminDashboardController::class, 'index'])->name('admin/dashbord');

Route::prefix('admin')->middleware(['auth'])->group(function () {

    // Route Ministere
    Route::controller(MinistereController::class)->group(function () {
        Route::get('ministeres', 'index');
    });

    // Route Position
    Route::controller(PositionController::class)->group(function () {
        Route::get('positions', 'index');
    });

    // Route Regime
    Route::controller(RegimeController::class)->group(function () {
        Route::get('regimes', 'index');
    });

    // Route Classe
    Route::controller(ClasseController::class)->group(function () {
        Route::get('classes', 'index');
    });


    // Route Echelon
    Route::controller(EchelonController::class)->group(function () {
        Route::get('echelons', 'index');
    });

    // Route Nature
    Route::controller(NatureController::class)->group(function () {
        Route::get('natures', 'index');
    });

    // Route Mention
    Route::controller(MentionController::class)->group(function () {
        Route::get('mentions', 'index');
    });

    // Route Cadre
    Route::controller(CadreController::class)->group(function () {
        Route::get('cadres', 'index');
    });

    // Route Categorie
    Route::controller(CategorieController::class)->group(function () {
        Route::get('categories', 'index');
    });

     // Route Categorie
     Route::controller(CorpsController::class)->group(function () {
        Route::get('corps', 'index');
    });
});
