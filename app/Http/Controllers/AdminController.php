<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AdminController extends Controller
{
    public function admin(){
        

        return view('admin');
    }

    public function producto(){
        $attributes = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_unitario' => 'required',
            'id_categoria' => 'required'
        ]);

        Producto::create($attributes);

        return redirect('mi-tienda/admin');
    }

    public function categoria(){
        $attributes = request()->validate([
            'nombre' => 'required'
        ]);

        Categoria::create($attributes);

        return redirect('mi-tienda/admin');
    }

    public function editarproducto(Producto $producto){
        return view('editarproducto', ['producto' => $producto]);
    }

    public function actualizarproducto(Producto $producto){
        $attributes = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_unitario' => 'required',
            'id_categoria' => 'required'
        ]);

        $producto->update($attributes);

        return redirect('mi-tienda/admin');
    }

    public function destruirproducto(Producto $producto){
        $producto->delete();
        return redirect('mi-tienda/admin');
    }

    public function destruircategoria(Categoria $categoria){
        $categoria->delete();
        return redirect('mi-tienda/admin');
    }
}