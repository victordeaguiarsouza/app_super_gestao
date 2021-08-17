<?php

namespace Database\Factories;

use App\Models\SiteContato;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SiteContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteContato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'      => $this->faker->name(),
            'telefone'  => $this->faker->phoneNumber(),
            'email'     => $this->faker->unique()->safeEmail(),
            'motivo'    => $this->faker->numberBetween(1,3),
            'mensagem'  => $this->faker->realText($maxNbChars = 100, $indexSize = 2),
        ];
    }

}
