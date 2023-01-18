<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Livro>
 */
class LivroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $titulo = fake()->words(3, true);
        $totLivro = fake()->randomNumber(3, false);
        return [
            'autor' => fake()->name(),
            'titulo' => $titulo,
            'slug' => Str::slug($titulo),
            'assunto' => fake()->word(),
            'dataAquisicao' => fake()->date(),
            'totLivro' => $totLivro,
            'emprestimo' => $totLivro,
            'numPropria' => fake()->randomNumber(6, true),
            'imagem' => fake()->imageUrl(),
            'genero' => fake()->word(),
            'nacionalidade' => fake()->country(),

        ];
    }
}
