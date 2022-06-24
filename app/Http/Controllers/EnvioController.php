<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Categoria;

class EnvioController extends Controller
{
    /**
     * Devuelve vista con los pedidos del usuario.
     * 
     * @return view
     */
    public function envio()
    {
        return view('pedidos', [
            'usuario' => auth()->user(),
            'categorias' => Categoria::all(),
            'compras' => Compra::where('id_usuario', auth()->user()->id_usuario)->with('productos')->with('envio')->get()
        ]);
    }
}
