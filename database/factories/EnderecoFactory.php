<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cep = fake()->randomNumber(5, true). "-". fake()->randomNumber(3, true);

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'logradouro' => fake()->streetName(),
            'numero' => fake()->buildingNumber(),
            'bairro' => fake()->state(),
            'cidade' => fake()->city(),
            'cep' => $cep,
            'comprovante' => fake()->imageUrl(),
            'referencia' => fake()->streetSuffix(),
        ];
    }
}
