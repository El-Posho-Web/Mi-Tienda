<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use App\Models\Envio;

/** Esta clase se encarga de la logica de negocios de la pantalla del administrador 
* @author Joaquin Durán <duranexj99@gmail.com>
* @version 1.0 */

class AdminController extends Controller
{
    /**
     * Devuelve la vista del admin 
     *@return view */
    public function admin(){
        return view('admin');
    }

    /**
     *  Crea un nuevo producto
     *  Se valida los datos enviados en el formulario 
     *  @return redirect */

    public function producto(){
        $attributes = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_unitario' => 'required',
            'id_categoria' => 'required'
        ]);

        Producto::create($attributes);

        return redirect('mi-tienda/admin')->with('mensaje', 'Producto creado exitosamente.');
    }
    /**
     * Crea una nueva categoria. Valida los datos enviados en el formulario
     * @return redirect */

    public function categoria(){
        $attributes = request()->validate([
            'nombre' => 'required'
        ]);

        Categoria::create($attributes);

        return redirect('mi-tienda/admin')->with('mensaje', 'Categoria creada exitosamente.');
    }
    /**
     * Devuelve la vista para modificar el producto seleccionado.
     * @param Producto $producto 
     * @return view */

    public function editarproducto(Producto $producto){
        return view('editarproducto', ['producto' => $producto]);
    }

    /** Actualiza el producto seleccionado. Vuelve a la pantalla del admin. 
     * @param Producto $producto 
     * @return redirect */

    public function actualizarproducto(Producto $producto){
        $attributes = request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'stock' => 'required',
            'precio_unitario' => 'required',
            'id_categoria' => 'required'
        ]);

        $producto->update($attributes);

        return redirect('mi-tienda/admin')->with('mensaje', 'Producto actualizado exitosamente.');
    }

    /** Elimina el producto seleccionado 
     *@param Producto $producto
     *@return redirect */

    public function destruirproducto(Producto $producto){
        $producto->delete();
        return redirect('mi-tienda/admin')->with('mensaje', 'Producto eliminado exitosamente.');
    }

    /** Elimina la categoria seleccionada. Si existe algun producto en dicha categoria, esta no se puede eliminar.
    *@param Categoria $categoria
    *@return redirect */

    public function destruircategoria(Categoria $categoria){
        if (count($categoria->productos) > 0){
            return redirect('mi-tienda/admin')->with('mensaje', 'No se puede eliminar categoria. Existen productos con dicha categoria.');
        } else {
        $categoria->delete();
        return redirect('mi-tienda/admin')->with('mensaje', 'Categoria eliminada exitosamente.');
        }

    }

    /** Modifica el estado del envio. Puede ser a confirmado o cancelado.
     *@param Envio $envio
     *@return redirect */

    public function actualizarenvio(Envio $envio){
        $attributes = request()->validate([
            'id_estado_envio' => 'required'
        ]);

        $envio->update($attributes);

        return redirect('mi-tienda/admin')->with('mensaje', 'Envio actualizado exitosamente');
    }
}