<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function crear()
    {
        return view('registro');
    }

    public function guardar()
    {

        $atributos = request()->validate([
            'nombre' => 'required|max:30',
            'apellido' => 'required|max:30',
            'email' => 'required|email|max:30|unique:users,email',
            'password' => 'required|min:8|max:255',
            'dni' => 'required|numeric',
            'domicilio' => 'required|max:50'
        ]);

        //$atributos['contraseña'] = bcrypt($atributos['contraseña']);
        
        $usuario = User::create($atributos);

        auth()->login($usuario);

        return redirect('mi-tienda')->with('correcto', 'Tu cuenta fue creada correctamente.');
    }
}
