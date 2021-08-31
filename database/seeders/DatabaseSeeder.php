<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        (new \Database\Seeders\MotivoSeeder())->run();
        (new \Database\Seeders\UnidadeSeeder())->run();
        \App\Models\Fornecedor::factory(10)->create();
        \App\Models\SiteContato::factory(10)->create();
        (new \Database\Seeders\ProdutoSeeder())->run();
        (new \Database\Seeders\ProdutoDetalheSeeder())->run();
    }
}
