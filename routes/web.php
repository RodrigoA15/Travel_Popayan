<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.layout');
});

//Ruta Servicios
Route::resource('servicio', ServiceController::class);
//Ruta Sitios
Route::resource('sitio', SiteController::class);
