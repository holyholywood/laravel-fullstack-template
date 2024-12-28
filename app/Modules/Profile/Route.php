<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Profile\ProfileController;

Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('', 'index')->name("index");
    Route::get('/json', 'json_data')->name("json_data");
    Route::post('/update/{id}', 'update')->name("update");
    Route::get('/{id}', 'show')->name("show");
});
