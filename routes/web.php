<?php

use App\Http\Controllers\admin\ApplicationController;
use App\Http\Controllers\admin\PortfolioController;
use App\Http\Controllers\admin\ServicesController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [ApplicationController::class, "index"])->name('index');
        Route::put('{application}', [ApplicationController::class, "change_state"])->name('change_state');
        Route::get('show_done_app', [ApplicationController::class, "show_done_app"])->name('show_done_app');

        Route::prefix('portfolio')->name('portfolio.')->group(function () {
            Route::get('', [PortfolioController::class, 'index'])->name('index');
            Route::get('/create', [PortfolioController::class, 'create'])->name('create');
            Route::post('', [PortfolioController::class, 'store'])->name('store');
            Route::get('{portfolio}/edit', [PortfolioController::class, 'edit'])->name('edit');
            Route::put('{portfolio}', [PortfolioController::class, 'update'])->name('update');
            Route::delete('{portfolio}/destroy', [PortfolioController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('services')->name('services.')->group(function () {
            Route::get('', [ServicesController::class, 'index'])->name('index');
            Route::get('/create', [ServicesController::class, 'create'])->name('create');
            Route::post('', [ServicesController::class, 'store'])->name('store');
            Route::get('{service}/edit', [ServicesController::class, 'edit'])->name('edit');
            Route::put('{service}', [ServicesController::class, 'update'])->name('update');
            Route::delete('{service}/destroy', [ServicesController::class, 'destroy'])->name('destroy');
        });
    });
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('showLoginForm');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});
