<?php

namespace Database\Factories;

use App\Models\Fornecedor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FornecedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fornecedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'  => $this->faker->name(),
            'site'  => $this->faker->unique()->url(),
            'uf'    => $this->faker->unique()->stateAbbr(),
            'email' => $this->faker->unique()->safeEmail(),
        ];
    }

}
