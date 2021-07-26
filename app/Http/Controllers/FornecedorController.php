<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{

    public function execute()
    {
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1', 
                'ativo'=> 'N', 
                'cnpj' => '0',
                'ddd'  => '11',
                'tel'  => '0000-0000',
            ],
            1 => [
                'nome' => 'Fornecedor 2', 
                'ativo'=> 'S',
                'cnpj' => null,
                'ddd'  => '85',
                'tel'  => '0000-0000',
            ],
            2 => [
                'nome' => 'Fornecedor 2', 
                'ativo'=> 'S',
                'cnpj' => null,
                'ddd'  => '32',
                'tel'  => '0000-0000',
            ],
        ];

        return view('app.fornecedor.index', compact('fornecedores'));
        //return view('app.fornecedor.index');
    }

}