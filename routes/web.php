<?php

use App\Http\Controllers\admin\ApplicationController;
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

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/',[ApplicationController::class, "index"])->name('index');
    Route::put('{application}',[ApplicationController::class, "change_state"])->name('change_state');
    Route::get('show_done_app',[ApplicationController::class, "show_done_app"])->name('show_done_app');
});
