<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'title' => fake()->text(100),
            'thumbnail' => "https://images-us.bookshop.org/ingram/9780063316096.jpg?height=500&v=v2-5306eebbb04831e44d383506dd31243d",
            'author' => fake()->text(10),
            'publisher' => fake()->text(20),
            'publication' => fake()->date(),
            'price' => fake()->randomNumber(6),
            'quantity' => fake()->randomNumber(2),
            'category_id' => rand(1,5)
        ];
    }
}
