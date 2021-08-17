<?php

namespace App\Http\Controllers;

use App\Models\Motivo;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function execute()
    {
        $motivos = Motivo::all();

        return view('site.contato',['motivos' => $motivos]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'nome'     => 'required|min:3|max:50',
            'telefone' => 'required',
            'email'    => 'required',
            'motivo'   => 'required',
            'mensagem' => 'required|max:2000',
        ]);

        /* $contato = new SiteContato();

        $contato->fill($request->all());
        $contato->save(); */
    }

}
