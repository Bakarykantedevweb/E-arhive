<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MinistereController;
use App\Http\Controllers\Admin\PositionController;
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

Route::get('/admin/dashbord',[AdminDashboardController::class,'index'])->name('admin/dashbord');

Route::prefix('admin')->group(function(){

    // Route Ministere
    Route::controller(MinistereController::class)->group(function(){
        Route::get('ministeres','index');
    });

    // Route Position
    Route::controller(PositionController::class)->group(function(){
        Route::get('positions','index');
    });
});
