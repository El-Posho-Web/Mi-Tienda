<?php

namespace App\Http\Controllers;

use App\Classes\CarritoFacade as Carrito;
use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Envio;


class ProductoController extends Controller
{
    /**
     * Devuelve una vista con todos los datos del producto ingresado como parametro.
     * 
     * @param Producto $producto
     * @return view
     */
    public function producto(Producto $producto)
    {
        return view('producto',
        [
            'producto' => $producto,
            'usuario' => auth()->user(),
            'productos' => Producto::where('id_categoria',$producto->id_categoria)->get(),
            'categorias' => Categoria::all()
        ]);
    }

    /**
     * Agrega un nuevo producto al carrito. Redirecciona con un mensaje.
     * 
     * @param Producto $producto
     * @return redirect
     */
    public function agregar(Producto $producto)
    {
        $request = request()->validate([
            'cantidad' => 'required|numeric',
        ]);

        if(!Carrito::agregar($producto, $request)){
            return redirect('mi-tienda/')->with('productoexiste', 'El producto ya se encuentra en el carrito.');
        }

        return redirect('mi-tienda/carrito')->with('productoagregado', 'El producto se agrego el producto al carrito.');
    }

    /**
     * Elimina un producto del carrito. Redirecciona con un mensaje.
     * 
     * @return redirect
     */
    public function eliminar()
    {
        $request = request()->validate([
            'id_producto' => 'required|numeric'
        ]);
        
        Carrito::eliminar($request);

        return redirect('/mi-tienda/carrito')->with('productoeliminado', 'El producto se elimino del carrito.');
    }

    /**
     * Confirma la compra del producto. Redirecciona con un mensaje.
     * 
     * @return redirect
     */
    public function confirmar()
    {
        $confirmacion = Carrito::confirmar();

        if($confirmacion === 'sinproductos'){
            return redirect('/mi-tienda/carrito')->with('sinproductos', 'No tienes productos en el carrito.');
        }

        if($confirmacion === 'compracancelada'){
            return redirect('mi-tienda')->with('compracancelada', 'La compra fue cancelada porque se rechazo el pago en tu tarjeta.');
        }

        if($confirmacion === 'sinstock'){
            return redirect('mi-tienda')->with('sinstock', 'La compra fue cancelada no hay suficiente stock en uno de los productos.');
        }

        return redirect('mi-tienda')->with('comprarealizada', 'La compra fue correctamente. Su pedido se está procesando. Consulte la página Pedidos
        para ver el estado de su pedido');
    }

    /**
     * Devuelve una vista con los productos que hay en el carrito.
     * 
     * @return view
     */
    public function carrito()
    {
        return view('carrito',
        [
            'usuario' => auth()->user(),
            'carrito' => Carrito::get_carrito(),
            'categorias' => Categoria::all(),
            'total' => Carrito::get_total()
        ]);
    }
}
