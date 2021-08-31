<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index(Request $request)
    {
        $clientes = Cliente::paginate(10);

        return view('app.cliente.index',['clientes' => $clientes, 'request' => $request->all()]);
    }

    public function create()
    {
        return view('app.cliente.create',['cliente' => new Cliente(), 'titulo' => 'Adicionar Cliente']);
    }

    public function store(Request $request)
    {

        $regras = [
            'nome' => 'required|min:3|max:60'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max' => 'O campo nome deve ter no máximo 60 caracteres.',
        ];

        $cliente = new Cliente();
        $cliente->create($request->all());

        return redirect()->route('cliente.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Cliente $cliente)
    {
        return view('app.cliente.create',['cliente' => $cliente, 'titulo' => 'Editar Cliente']);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('cliente.index');
    }

    public function destroy($id)
    {
        //
    }
}
