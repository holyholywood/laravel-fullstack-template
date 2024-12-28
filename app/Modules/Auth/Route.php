<?php

use App\Modules\Auth\AuthController;
use App\Modules\Auth\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/logout', 'logout')->name("auth_logout");
    Route::get('/login', 'login')->name("auth_login");
    Route::post('/login', 'loginUser')->name("auth_login_user");
    Route::get('/register', 'register')->name("auth_register");
    Route::post('/register', 'registerUser')->name("auth_register_user");
});

Route::prefix('roles')->name('role.')->controller(RoleController::class)->middleware('auth')->group(function () {
    Route::get('/', 'index')->name("index");
    Route::get('/json', 'json_data')->name("json_data");
    Route::post('/add', 'create')->name("create");
    Route::get('/add', 'add')->name("add");
    Route::post('/delete', 'destroy')->name("destroy");
    Route::get('/edit/{id}', 'edit')->name("edit");
    Route::post('/edit/{id}', 'update')->name("update");
    Route::get('/{id}', 'show')->name("show");
});
