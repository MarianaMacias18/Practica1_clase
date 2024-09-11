<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function formulario($tipo_persona = null)
    {
        //dd($tipo_persona);
        //return view('formulario-contacto');
        return view('formulario-contacto', compact('tipo_persona'));
        //return view('formulario-contacto', ['tipo_persona' => $tipo_persona]);
        //return view('formulario-contacto', compact('tipo'));
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

        return redirect('/lista');
    }


    public function lista()
    {
        //return view('lista');
        $mensajes = Contacto::all();
        return view('lista', compact('mensajes'));
        //return view('lista', ['mensaje=>$mensajes']);
        //return view('lista', ['mensaje=> Contacto::all()']);
    }
}
