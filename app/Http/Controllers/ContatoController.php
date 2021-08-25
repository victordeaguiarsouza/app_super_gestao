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
            'nome'       => 'required|min:3|max:50|unique:site_contatos',
            'telefone'   => 'required',
            'email'      => 'email',
            'motivos_id' => 'required',
            'mensagem'   => 'required|max:2000',
        ]);


        SiteContato::create($request->all());

        return redirect()->route('site.index');
    }

}
