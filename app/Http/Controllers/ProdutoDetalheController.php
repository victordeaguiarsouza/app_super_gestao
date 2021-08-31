<?php

namespace App\Http\Controllers;

use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoDetalheController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('app.produto_detalhe.create', ['titulo' => 'Detalhes do Produto', 'unidades' => Unidade::all()]);
    }

    public function store(Request $request)
    {
        ProdutoDetalhe::create($request->all());
        return redirect()->route('produto.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        //dd($produto_detalhe);

        return view('app.produto_detalhe.create', ['produto_detalhe' => $produto_detalhe, 'unidades' => Unidade::all(), 'titulo' => 'Editar Detalhe do Produto']);
    }

    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        return redirect()->route('produto.index');
    }

    public function destroy($id)
    {
        //
    }
}
