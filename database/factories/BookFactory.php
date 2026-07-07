<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
		'category_id' => Category::inRandomOrder()->first()->id,
		'title' => fake()->name(),
		'author' => fake()->name(),
		'publisher' => fake()->name(),
		'publish_year' => fake()->date(),
		'isbn' => fake()->numerify('#############'),
		'stock' => fake()->numberBetween(0,10)
        ];
    }
}
