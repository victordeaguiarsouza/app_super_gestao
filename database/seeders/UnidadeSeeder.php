<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unidade::create(['unidade' => 'UN', 'descricao' => 'Unidade']);
        Unidade::create(['unidade' => 'CX', 'descricao' => 'Caixa']);
        Unidade::create(['unidade' => 'KG', 'descricao' => 'Quilograma']);
    }
}
