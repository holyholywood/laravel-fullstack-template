<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Profile\ProfileController;

Route::prefix('profile')->controller(ProfileController::class)->middleware('auth')->group(function () {
    Route::get('', 'index')->name("profile_index");
    Route::get('/json', 'json_data')->name("profile_json_data");
    Route::post('/update/{id}', 'update')->name("profile_update");
    Route::get('/{id}', 'show')->name("profile_show");
});
