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

Route::prefix('roles')->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name("role_index");
    Route::get('/json', 'json_data')->name("role_json_data");
    Route::post('/add', 'create')->name("role_create");
    Route::get('/add', 'add')->name("role_add");
    Route::post('/delete', 'destroy')->name("role_destroy");
    Route::get('/edit/{id}', 'edit')->name("role_edit");
    Route::post('/edit/{id}', 'update')->name("role_update");
    Route::get('/{id}', 'show')->name("role_show");
});
