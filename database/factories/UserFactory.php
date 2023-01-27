<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cpf = fake()->randomNumber(3, true). ".". fake()->randomNumber(3, true). ".". fake()->randomNumber(3, true). "-". fake()->randomNumber(2, true);

        $telephone = "(". fake()->randomNumber(2, true).")". fake()->randomNumber(5, true). "-". fake()->randomNumber(4, true);


        return [
            'name' => fake()->name(),
            'birthDate' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'telephone' => $telephone,
            'photo' => fake()->imageUrl(),
            'cpf' => $cpf,
            'type' => $this->faker->randomElement(['admin', 'common']),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'password' => bcrypt(preg_replace('/[^0-9]/', '', $cpf)), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
