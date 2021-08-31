<?php

namespace Database\Seeders;

use App\Models\ProdutoDetalhe;
use Illuminate\Database\Seeder;

class ProdutoDetalheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdutoDetalhe::create(['produto_id' => 1, 'unidade_id' => 1, 'comprimento' => 1 , 'largura' => 2, 'altura' => 2]);
        ProdutoDetalhe::create(['produto_id' => 2, 'unidade_id' => 2, 'comprimento' => 3 , 'largura' => 4, 'altura' => 4]);
        ProdutoDetalhe::create(['produto_id' => 3, 'unidade_id' => 3, 'comprimento' => 4 , 'largura' => 6, 'altura' => 6]);
    }
}
