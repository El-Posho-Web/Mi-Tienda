<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EnvioController;
use App\Models\Producto;
use App\Models\Categoria;

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
route ::get('/test', function() {
   return view('csstest'); 
});

Route::get('/', function () {
    return redirect('mi-tienda');
});

Route::get('mi-tienda', function(){
    return view('index', [
        'usuario' => Auth::user(),
        'categorias' => Categoria::with('productos')->get()
    ]);
});

Route::get('mi-tienda/categoria/{categoria:nombre}', function(Categoria $categoria){
    return view('productos', [
        'productos' => Producto::where('id_categoria', $categoria->id_categoria)->paginate(10), 
        'usuario' => Auth::user(),
        'categorias' => Categoria::all()
    ]); 
});

/* LAS RUTAS HACEN LLAMADOS A LOS CONTROLADORES UBICADOS EN APP\HTTP\CONTROLLERS. 
CADA CONTROLADOR SE ENCARGA DE LA LOGICA DE NEGOCIOS
ESTAN DIVIDOS POR FUNCIONES RELACIONADAS  */

/* MIDDLEWARES CLASES QUE CONTROLAN EL ACCESO A LAS RUTAS */

Route::get('mi-tienda/carrito', [ProductoController::class, 'carrito'])->middleware('auth');

Route::post('mi-tienda/carrito/agregar/{producto}', [ProductoController::class, 'agregar'])->middleware('auth');

Route::post('mi-tienda/carrito/eliminar', [ProductoController::class, 'eliminar'])->middleware('auth');

Route::get('mi-tienda/producto/{producto}', [ProductoController::class, 'producto']);

Route::get('mi-tienda/carrito/confirmar', [ProductoController::class, 'confirmar'])->middleware('auth');

Route::get('mi-tienda/mis-pedidos', [EnvioController::class, 'envio'])->middleware('auth');

Route::get('mi-tienda/login', [SesionController::class, 'crear'])->middleware('guest');

Route::post('mi-tienda/login', [SesionController::class, 'login']);

Route::post('mi-tienda/logout', [SesionController::class, 'logout'])->middleware('auth');

Route::get('mi-tienda/registro', [RegistroController::class, 'crear'])->middleware('guest');

Route::post('mi-tienda/registro', [RegistroController::class, 'guardar'])->middleware('guest');

Route::get('mi-tienda/admin', [AdminController::class, 'admin'])->middleware('isadmin');

Route::post('mi-tienda/admin/producto', [AdminController::class, 'producto'])->middleware('isadmin');

Route::post('mi-tienda/admin/categoria', [AdminController::class, 'categoria'])->middleware('isadmin');

Route::get('mi-tienda/admin/producto/{producto}/editar', [AdminController::class, 'editarproducto'])->middleware('isadmin');

Route::post('mi-tienda/admin/producto/{producto}/actualizar', [AdminController::class, 'actualizarproducto'])->middleware('isadmin');

Route::delete('mi-tienda/admin/producto/{producto}/eliminar', [AdminController::class, 'destruirproducto'])->middleware('isadmin');

Route::delete('mi-tienda/admin/categoria/{categoria}/eliminar', [AdminController::class, 'destruircategoria'])->middleware('isadmin');

Route::post('/mi-tienda/admin/envio/{envio}/editar', [AdminController::class, 'actualizarenvio'])->middleware('isadmin');