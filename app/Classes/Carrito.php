<?php

namespace App\Classes;

use App\Models\Producto;
use App\Models\Compra;
use App\Models\Envio;

class Carrito{

    public function get_carrito(){
        return session()->get('carrito', []);
    }


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

    public function tiene($id_producto)
    {
        $carrito = Carrito::get_carrito();
        foreach($carrito as $producto){

            if (isset($producto['id_producto']) && $producto['id_producto'] == $id_producto) return true;

        }
        return false;

    }

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