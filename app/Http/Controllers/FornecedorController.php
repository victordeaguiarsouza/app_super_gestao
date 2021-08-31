<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function index(Request $request){

        return view('app.fornecedor.index');

    }

    public function listar(Request $request){

        $fornecedores = Fornecedor::with('produtos')->where('nome'  , 'like', '%'.$request->input('nome').'%')
                                  ->where('site'  , 'like', '%'.$request->input('site').'%')
                                  ->where('uf'    , 'like', '%'.$request->input('uf').'%')
                                  ->where('email' , 'like', '%'.$request->input('email').'%')
                                  ->paginate(5);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);

    }

    public function adicionar(Request $request){
        
        $mensagem = '';

        if($request->input('_token') != ''){
            
            $regras = [
                'nome'  => 'required|min:3|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'required',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido.',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres.',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                'uf.min'   => 'O campo deve ter no mínimo 2 caracteres.',
                'uf.max'   => 'O campo deve ter no máximo 2 caracteres.',
                'email'    => 'O campo email não foi preenchido corretamente',
            ];

            $request->validate($regras, $feedback);

            $id = $request->input('id');

            if(empty($id)){

                $fornecedor = new Fornecedor();
    
                $fornecedor->create($request->all());
    
                $mensagem = 'Cadastro realizado com sucesso.';
                
                return view('app.fornecedor.adicionar', ['mensagem' => $mensagem]);

            }else{
                
                $fornecedor = Fornecedor::find($id);
    
                $fornecedor->update($request->all());
    
                $mensagem = 'Cadastro atualizado com sucesso.';

                return redirect()->route('app.fornecedor.editar', ['id' => $id, 'mensagem' => $mensagem]);
            }
            
        }

    }

    public function editar($id, $mensagem = ''){

        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'mensagem' => $mensagem]);
    }

    public function excluir($id){

        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor.listar');
    }

}