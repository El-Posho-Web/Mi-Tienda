<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    //

    public function producto(Producto $producto)
    {
        return view('producto',
        [
            'producto' => $producto,
            'usuario' => auth()->user()
        ]);
    }

    public function vercarrito()
    {
        return session()->get('carrito');
    }

    public function agregar(Producto $producto)
    {
        request()->validate([
            'cantidad' => 'required|numeric',
        ]);


        $carrito = $this->vercarrito();

        if(isset($carrito[$producto->id_producto])){
            return redirect('mi-tienda/')->with('productoexiste', 'El producto ya se encuentra en el carrito.');
        }

        $carrito[$producto->id_producto] = [
            'nombre'=>$producto->nombre,
            'descripcion'=>$producto->descripcion,
            'categoria'=>$producto->categoria->nombre,
            'cantidad'=>request()->cantidad,
            'total'=>request()->cantidad*$producto->precio_unitario
        ];

        session()->put('carrito', $carrito);

        return redirect('mi-tienda/carrito')->with('productoagregado', 'El producto se agrego el producto al carrito.');
    }

    public function eliminar()
    {
        request()->validate([
            'id_producto' => 'required|numeric'
        ]);

        $carrito = $this->vercarrito();
        if(isset($carrito[request()->id_producto])) {
            unset($carrito[request()->id_producto]);
            session()->put('carrito', $carrito);
        }

        return redirect('/mi-tienda/carrito')->with('productoeliminado', 'El producto se elimino del carrito.');
    }

    public function confirmar()
    {
        # code...
    }

    public function carrito()
    {
        return view('carrito',
        [
            'usuario' => auth()->user(),
            'carrito' => $this->vercarrito(),
        ]);
    }
}
