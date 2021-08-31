<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use App\Models\Produto;
use App\Models\ProdutoDetalhe;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;

class ProdutoController extends Controller
{

    public function index(Request $request)
    {   
        //produtoDetalhe é o nome do metodo da model de produto que mapeia com produto_detalhes
        //usando o with nós mudamos do Lazy loading para o Eager loading, ou seja, os detalhes de cada produto
        //já existirão dentro da variável $produtos e serão enviados para a view.
        $produtos = Produto::with('produtoDetalhe')->paginate(5);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create()
    {
        $unidades = Unidade::all();

        return view('app.produto.create', [
            'produto' => new Produto(), 
            'unidades' => $unidades, 
            'titulo' => 'Adicionar Produto',
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function store(Request $request)
    {
        $this->validar($request);

        Produto::create($request->all());
        
        return redirect()->route('produto.index');
    }

    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    public function edit(Produto $produto)
    {
        return view('app.produto.create', [
            'produto' => $produto, 
            'unidades' => Unidade::all(), 
            'titulo' => 'Editar Produto',
            'fornecedores' => Fornecedor::all()
        ]);
    }

    public function update(Request $request, Produto $produto)
    {

        $this->validar($request);

        $produto->update($request->all());

        return redirect()->route('produto.index');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }

    public function validar(Request &$request)
    {
    
        $regras = [
            'nome'          => 'required|min:3|max:40',
            'descricao'     => 'required|min:3|max:200',
            'peso'          => 'required|integer',
            'unidade_id'    => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id',
        ];

        $feedback = [
            'required'             => 'O campo :attribute deve ser preenchido.',
            'nome.min'             => 'O campo nome deve ter no mínimo 3 caracteres.',
            'nome.max'             => 'O campo nome deve ter no máximo 40 caracteres.',
            'descricao.min'        => 'O campo descricao deve ter no mínimo 3 caracteres.',
            'descricao.max'        => 'O campo descricao deve ter no máximo 200 caracteres.',
            'peso.integer'         => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists'    => 'A unidade de medida informada não existe.',
            'fornecedor_id.exists' => 'O fornecedor informado não existe.'
        ];

        $request->validate($regras, $feedback);
    }

}
