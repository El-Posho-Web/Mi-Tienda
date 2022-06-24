<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Categoria;

class SesionController extends Controller
{
    /**
    * Devuelve la vista para loguear un usuario.
    * 
    * @return view
    */
    public function crear()
    {
        return view('login',[
            'categorias' => Categoria::all()
        ]);
    }

    /**
    * Cierra la sesion del usuario y la destruye en el caso que haya quedado guardada.
    * 
    * @return redirect
    */
    public function logout()
    {
        \Auth::logout();
        \Session::flush();
        return redirect('mi-tienda')->with('correcto', 'Cerraste tu sesion.');
    }

    /**
    * Valida los datos ingresados por el usuario. Intenta loguear al usuario y genera la sesion.
    * 
    * @return redirect
    */
    public function login()
    {
        $atributos = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        

        if (! auth()->attempt($atributos)) {
            throw ValidationException::withMessages([
                'email' => 'El correo no puede ser verificado.',
            ]);
        }

        session()->regenerate();
        
        return redirect('mi-tienda')->with('correcto', 'Ingresaste Correctamente.');
        
    }
}
