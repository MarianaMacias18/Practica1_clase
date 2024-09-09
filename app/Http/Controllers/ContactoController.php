<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario()
    {
        return view('formulario-contacto');
    }

    public function newContacto(Request $request)
    {
        #return 'Formulario Recibido';
        #dd($request->all());

        $request->validate([

            'nombre' => 'required|min:3|max:255',
            'correo' => 'required|email',
            'mensaje' => ['required', 'min:10']
        ]);

        $contacto = new Contacto(); // nuevo contato 
        $contacto->nombre = $request->nombre;
        $contacto->correo = $request->correo;
        $contacto->mensaje = $request->mensaje;
        $contacto->save();

        return redirect('/contacto');
    }
}
