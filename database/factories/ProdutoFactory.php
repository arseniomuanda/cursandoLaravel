<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $name = fake()->name,
            'slug' => Str::slug($name),
            'user' => User::pluck('id')->random(),
            'price' => fake()->latitude(min:10, max:20000),
            'description' => fake()->paragraph(),
            'image' => 'products/OemuwgbiPFxiIPk0RkanvazieH7b63yo40A0tyss.png'/* fake()->imageUrl() */,
            'cat' => Category::pluck('id')->random(),
            'brand' => Brand::pluck('id')->random(),
            'qtd' => fake()->numberBetween(12, 30),
            'sku' => fake()->numberBetween(2, 10)
        ];
    }
}
