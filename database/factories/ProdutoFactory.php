<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'       => $this->faker->name(),
            'telefone'   => $this->faker->phoneNumber(),
            'email'      => $this->faker->unique()->safeEmail(),
            'motivos_id' => $this->faker->numberBetween(1,6),
            'mensagem'   => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
        ];
    }

}
