<?php

namespace App\Classes;

use App\Models\Producto;
use App\Models\Compra;
use App\Models\Envio;

/**
 * Esta clase se encarga de toda la logica del carrito de compras.
 *
 *
 * @author  Juan José Tonelli <tonelli.juanjo@gmail.com>
 * @version 1.0
 *
 */
class Carrito{

    /**
     * Devuelve un array con los items agregados al carrito. En el caso que no haya nada agregado se devuelve al arreglo vacio.
     * 
     * @return array
     */
    public function get_carrito(){
        return session()->get('carrito', []);
    }

    /**
     * Devuelve el precio total de los items que hay en el carrito.
     * 
     * @return float
     */
    public function get_total()
    {
        $carrito = CarritoFacade::get_carrito();

        $total = 0;
        foreach($carrito as $producto){
            $p = Producto::find($producto['id_producto']);
            $total = $total + $p->precio_unitario * $producto['cantidad'];
        }

        return $total;
    }

    /**
     * Agrega un producto al carrito guardandolo en la sesion del usuario, en el caso de que exista el producto ya en el carrito se devulve false y no es agregado.
     * @param Producto $producto
     * @param mixed $request
     * @return bool
     */
    public function agregar(Producto $producto, $request)
    {
        $carrito = Carrito::get_carrito();
        if(Carrito::tiene($producto->id_producto)){
            return false;
        }
        $datos = array(
            'id_producto' => $producto->id_producto,
            'nombre' => $producto->nombre,
            'descripcion'=>$producto->descripcion,
            'categoria'=>$producto->categoria->nombre,
            'precio_unitario' => $producto->precio_unitario,
            'cantidad' => $request['cantidad'] 
        );

        $carrito[] = $datos;
        
        session()->put('carrito', $carrito);

        return true;
    }

    /**
     * Devuelve si el producto con el id que se pasa como parametro existe en el carrito.
     * @param integer $id_producto
     * @return bool
     */
    public function tiene($id_producto)
    {
        $carrito = Carrito::get_carrito();
        foreach($carrito as $producto){

            if (isset($producto['id_producto']) && $producto['id_producto'] == $id_producto) return true;

        }
        return false;

    }

    /**
     * Elimina un producto del carrito con el id del producto pasada en la $request. 
     * Si no hay mas productos en el carrito luego de eliminar el elemento se olvida la clave en la sesion.
     * @param mixed $request
     */
    public function eliminar($request)
    {
        $carrito = Carrito::get_carrito();
        
        foreach($carrito as $id => $producto){
            if(isset($producto['id_producto']) && $producto['id_producto'] == $request['id_producto']) {
                unset($carrito[$id]);
                session()->put('carrito', $carrito);
            }

        }

        if(count($carrito) === 0){
            session()->forget('carrito');
        }
    }

    /**
     * Confirma la compra. 
     * En caso que no haya productos en el carrito, la compra sea de mas de 1000 o ya no haya mas stock al momento de confirmar la compra se devuelve un mensaje de error y se elimina el carrito de la sesion. 
     * Si se confirma la compra se crean los registros en la BD y se elimina el carrito de la sesion.
     * @return string|void
     */
    public function confirmar()
    {
        $carrito = Carrito::get_carrito();
        if(($carrito === null) || (count($carrito) === 0)){
            return 'sinproductos';
        }
        
        $total = Carrito::get_total();

        if($total > 1000){
            session()->forget('carrito');
            return 'compracancelada';
        }

        $arrayProductos = [];

        foreach($carrito as $producto){

            $p = Producto::find($producto['id_producto']);

            if($p->stock < $producto['cantidad']){
                session()->forget('carrito');
                return 'sinstock';
            }

            array_push($arrayProductos, ['id_producto' => $producto['id_producto'], 'cantidad'=> $producto['cantidad']]);
            Producto::where('id_producto', $producto)->update(['stock' => $p->stock - $producto['cantidad']]); 
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
    }
}