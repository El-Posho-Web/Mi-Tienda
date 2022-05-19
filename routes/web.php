<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\AdminController;

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

Route::get('mi-tienda/admin', [AdminController::class, 'admin'])->middleware('isadmin');

Route::post('mi-tienda/admin/producto', [AdminController::class, 'producto']);

Route::post('mi-tienda/admin/categoria', [AdminController::class, 'categoria']);

Route::get('mi-tienda/admin/producto/{producto}/editar', [AdminController::class, 'editarproducto']);

Route::post('mi-tienda/admin/producto/{producto}/actualizar', [AdminController::class, 'actualizarproducto']);

Route::delete('mi-tienda/admin/producto/{producto}/eliminar', [AdminController::class, 'destruirproducto']);