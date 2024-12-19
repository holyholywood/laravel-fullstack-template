<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Currency\CurrencyController;

Route::prefix('currencies')->controller(CurrencyController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("currency_index");
    Route::get('/json', 'json_data')->name("currency_json_data");
    Route::post('/add', 'create')->name("currency_create");
    Route::get('/add', 'add')->name("currency_add");
    Route::post('/delete', 'destroy')->name("currency_destroy");
    Route::get('/edit/{id}', 'edit')->name("currency_edit");
    Route::post('/edit/{id}', 'update')->name("currency_update");
    Route::get('/{id}', 'show')->name("currency_show");
});
