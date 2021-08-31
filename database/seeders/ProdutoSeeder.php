<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::create(['unidade_id' => 1, 'fornecedor_id' => 1, 'nome' => 'Bicicleta'   , 'descricao' => 'Perfeita para passeios no parque.']);
        Produto::create(['unidade_id' => 2, 'fornecedor_id' => 2, 'nome' => 'Desodorante' , 'descricao' => 'Caixa com 12 unidades.']);
        Produto::create(['unidade_id' => 3, 'fornecedor_id' => 3, 'nome' => 'Soja'        , 'descricao' => 'Grãos de soja.']);
    }
}
