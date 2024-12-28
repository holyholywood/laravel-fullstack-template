<?php

use App\Modules\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("index");
});
