<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Media\MediaController;

Route::prefix('medias')->name('media.')->controller(MediaController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("index");
    Route::get('/json', 'json_data')->name("json_data");
    Route::post('/add', 'create')->name("create");
    Route::get('/add', 'add')->name("add");
    Route::post('/delete', 'destroy')->name("destroy");
    Route::get('/edit/{id}', 'edit')->name("edit");
    Route::post('/edit/{id}', 'update')->name("update");
    Route::get('/{id}', 'show')->name("show");
});
