<?php

use App\Http\Middleware\AuthMiddleware;
use App\Modules\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/logout', 'logout')->name("auth_logout");
    Route::get('/login', 'login')->name("auth_login");
    Route::post('/login', 'loginUser')->name("auth_login_user");
    Route::get('/register', 'register')->name("auth_register");
    Route::post('/register', 'registerUser')->name("auth_register_user");
});
