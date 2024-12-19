<?php

use Illuminate\Support\Facades\Route;
use App\Modules\User\UserController;

Route::prefix('users')->controller(UserController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("user_index");
    Route::get('/json', 'json_data')->name("user_json_data");
    Route::post('/add', 'create')->name("user_create");
    Route::get('/add', 'add')->name("user_add");
    Route::post('/delete', 'destroy')->name("user_destroy");
    Route::get('/edit/{id}', 'edit')->name("user_edit");
    Route::post('/edit/{id}', 'update')->name("user_update");
    Route::get('/{id}', 'show')->name("user_show");
});
