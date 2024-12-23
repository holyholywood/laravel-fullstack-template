<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data =  ['title' => 'Welcome'];
    return redirect()->route('dashboard_index');
});

Route::get('/dashboard', function () {
    return "Dashboard Page";
})->middleware('auth')->name('dashboard_index');

require base_path('app/Modules/Auth/Route.php');
require base_path('app/Modules/User/Route.php');
require base_path('app/Modules/Profile/Route.php');
require base_path('app/Modules/Customer/Route.php');
require base_path('app/Modules/CustomerIncome/Route.php');
require base_path('app/Modules/Media/Route.php');
require base_path('app/Modules/Currency/Route.php');
