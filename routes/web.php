<?php

use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\Auth\LoginController;
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


Route::middleware('auth')->group(function (){
    Route::prefix('admin')->name('admin.')->group(function(){
        Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
        Route::prefix('application')->name("application.")->group(function (){
            Route::get('',[ApplicationController::class, "index"])->name('index');
            Route::get('done-app',[ApplicationController::class, "doneApp"])->name('doneApp');
        });
        Route::prefix('portfolio')->name('portfolio.')->group(function (){
            Route::get('', [PortfolioController::class, 'index'])->name('index');
            Route::get('/create', [PortfolioController::class, 'create'])->name('create');
            Route::post('', [PortfolioController::class, 'store'])->name('store');
            Route::get('{portfolio}/edit', [PortfolioController::class, 'edit'])->name('edit');
            Route::put('{portfolio}', [PortfolioController::class, 'update'])->name('update');
            Route::delete('{portfolio}/destroy', [PortfolioController::class, 'destroy'])->name('destroy');
        });
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function (){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});
