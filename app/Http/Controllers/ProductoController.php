<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Envio;


class ProductoController extends Controller
{
    //

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

    public function vercarrito()
    {
        return session()->get('carrito');
    }

    public function gettotal()
    {
        $carrito = $this->vercarrito();
        $total = 0;
        foreach($carrito as $producto){
            $total = $total + $producto['total'];
        }

        return $total;
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

        if(count($carrito) === 0){
            session()->forget('carrito');
        }

        return redirect('/mi-tienda/carrito')->with('productoeliminado', 'El producto se elimino del carrito.');
    }

    public function confirmar()
    {
        $carrito = $this->vercarrito();
        if(($carrito === null) || (count($carrito) === 0)){
            return redirect('/mi-tienda/carrito')->with('sinproductos', 'No tienes productos en el carrito.');
        }
        
        $total = $this->gettotal();

        if($total > 1000){
            session()->forget('carrito');
            return redirect('mi-tienda')->with('compracancelada', 'La compra fue cancelada porque se rechazo el pago en tu tarjeta.');
        }

        $arrayProductos = [];

        
/*         $compra = Compra::create([
            'id_usuario' => auth()->user()->id_usuario,
            'precio_total' => $total
        ]);
        
        Envio::create([
            'id_compra' => $compra->id_compra,
            'direccion' => auth()->user()->domicilio
        ]); */

        foreach($carrito as $producto => $id){

            $p = Producto::find($producto);

            if($p->stock < $id['cantidad']){
                session()->forget('carrito');
                return redirect('mi-tienda')->with('sinstock', 'La compra fue cancelada no hay suficiente stock en uno de los productos.');
            }

            array_push($arrayProductos, ['id_producto' => $producto, 'cantidad'=> $id['cantidad']]);
            Producto::where('id_producto', $producto)->update(['stock' => $p->stock - $id['cantidad']]); 
/*              $compra->productos()->attach($producto, ['cantidad'=>$id['cantidad']]);  */
        }

        $compra = Compra::create([
            'id_usuario' => auth()->user()->id_usuario,
            'precio_total' => $total
        ]);

        $compra->productos()->attach($arrayProductos);
        
        Envio::create([
            'id_compra' => $compra->id_compra,
            'direccion' => auth()->user()->domicilio
        ]);

        session()->forget('carrito');

        return redirect('mi-tienda')->with('comprarealizada', 'La compra fue correctamente. Su pedido se está procesando. Consulte la página Pedidos
        para ver el estado de su pedido');
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
