<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;

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
    return redirect('mi-tienda');
});

Route::get('mi-tienda', function(){
    return view('index');
});

Route::get('mi-tienda/login', [SesionController::class, 'crear'])->middleware('guest');

Route::post('mi-tienda/login', [SesionController::class, 'login']);

Route::post('mi-tienda/logout', [SesionController::class, 'logout'])->middleware('auth');

Route::get('mi-tienda/registro', [RegistroController::class, 'crear'])->middleware('guest');

Route::post('mi-tienda/registro', [RegistroController::class, 'guardar'])->middleware('guest');