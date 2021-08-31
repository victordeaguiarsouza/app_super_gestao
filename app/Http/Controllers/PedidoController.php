<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(5);

        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    public function create()
    {
        return view('app.pedido.create', ['pedido' => new Pedido(), 'clientes' => Cliente::all(), 'titulo' => 'Adicionar Cliente']);
    }

    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id'
        ];

        $feedback = [
            'cliente_id.exists' => 'O cliente não existe.'
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->create($request->all());

        return redirect()->route('pedido.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Pedido $pedido)
    {
        return view('app.pedido.create', ['pedido' => $pedido]);
    }

    public function update(Request $request, Pedido $pedido)
    {

        $pedido->update($request->all());

        return redirect()->route('produto.index');
    }

    public function destroy($id)
    {
        //
    }

}
