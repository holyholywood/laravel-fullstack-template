<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Customer\CustomerController;

Route::prefix('customers')->controller(CustomerController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("customer_index");
    Route::post('/add', 'create')->name("customer_create");
    Route::get('/add', 'add')->name("customer_add");
    Route::post('/delete', 'destroy')->name("customer_destroy");
    Route::get('/edit/{id}', 'edit')->name("customer_edit");
    Route::post('/edit/{id}', 'update')->name("customer_update");
    Route::get('/{id}', 'show')->name("customer_show");
});
