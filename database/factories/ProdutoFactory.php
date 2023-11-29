<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'user' => User::pluck('id')->random(),
            'price' => fake()->latitude(),
            'description' => fake()->paragraph(),
            'image' => fake()->imageUrl(),
            'cat' => Category::pluck('id')->random(),
            'qtd' => fake()->numberBetween(12, 30)
        ];
    }
}
