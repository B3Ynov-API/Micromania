<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GenresProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            DB::table('genres_products')->insert([
                'genre_id' => fake()->randomElement(DB::table('genres')->get())['id'],
                'product_id' => fake()->randomElement(DB::table('products')->get())['id'],
            ]),
        ];
    }
}
