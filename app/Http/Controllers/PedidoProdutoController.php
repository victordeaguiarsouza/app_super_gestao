<?php

namespace App\Http\Controllers;

use App\Models\PedidoProduto;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;

class PedidoProdutoController extends Controller
{

    public function index()
    {
        //
    }

    public function create(Pedido $pedido)
    {

        return view('app.pedido_produto.create', [
            'pedido'   => $pedido, 
            'titulo'   => 'Adicionar Produto ao Pedido',
            'produtos' => Produto::all()
        ]);
    }

    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required',
        ];

        $feedback = [
            'produto_id.exists' => 'O produto informado não existe.',
            'required'          => 'O :attribute deve possuir um valor válido.'
        ];

        $request->validate($regras, $feedback);

        $pedido->produtos()->attach(
            $request->get('produto_id'),
            [
                'quantidade' => $request->get('quantidade')
            ]
        );

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(PedidoProduto $pedidoProduto)
    {
        $pedido_id = $pedidoProduto->pedido_id;
        $pedidoProduto->delete();
        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
