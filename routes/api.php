<?php

use App\Http\Controllers\Api\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::prefix('application')->name('.application')->group(function () {
    Route::post('', [ApplicationController::class, 'store'])->name('store');
});
