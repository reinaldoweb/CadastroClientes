<?php

namespace Database\Factories;

use App\Models\Cadastro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cadastro>
 */
class CadastroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cadastro::class;

    public function definition()
    {
        return [
            //
            'nome' => $this->faker->name(),
            'sobrenome' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'telefone' => $this->faker->tollFreephoneNumber(),
            'idade' => $this->faker->numberBetween(20,80),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->citySuffix(),
            'cidade' => $this->faker->city(),
            'uf' => $this->faker->stateAbbr(),
            'endereco' => $this->faker->streetAddress(),
        ];
    }
}
