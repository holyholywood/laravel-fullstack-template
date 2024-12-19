<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Media\MediaController;

Route::prefix('medias')->controller(MediaController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("media_index");
    Route::get('/json', 'json_data')->name("media_json_data");
    Route::post('/add', 'create')->name("media_create");
    Route::get('/add', 'add')->name("media_add");
    Route::post('/delete', 'destroy')->name("media_destroy");
    Route::get('/edit/{id}', 'edit')->name("media_edit");
    Route::post('/edit/{id}', 'update')->name("media_update");
    Route::get('/{id}', 'show')->name("media_show");
});
