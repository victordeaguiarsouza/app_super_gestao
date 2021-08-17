<?php

namespace Database\Seeders;

use App\Models\Motivo;
use Illuminate\Database\Seeder;

class MotivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Utilizando o FornecedorFactory para gerar alguns fornecedores 
        //veja a classe FornecedorFactory

        Motivo::create(['nome' => 'Dúvida']);
        Motivo::create(['nome' => 'Elogio']);
        Motivo::create(['nome' => 'Reclamação']);
    }
}
