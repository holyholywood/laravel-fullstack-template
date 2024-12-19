<?php

use Illuminate\Support\Facades\Route;
use App\Modules\CustomerIncome\CustomerIncomeController;

Route::prefix('customer-incomes')->controller(CustomerIncomeController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("customer_income_index");
    Route::get('/json', 'json_data')->name("customer_income_json_data");
    Route::post('/add', 'create')->name("customer_income_create");
    Route::get('/add', 'add')->name("customer_income_add");
    Route::post('/delete', 'destroy')->name("customer_income_destroy");
    Route::get('/edit/{id}', 'edit')->name("customer_income_edit");
    Route::post('/edit/{id}', 'update')->name("customer_income_update");
    Route::get('/{id}', 'show')->name("customer_income_show");
});
