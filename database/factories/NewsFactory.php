<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->paragraph(),
            'main_image' => "img/".fake()->randomElement([
                'news-700x435-1.jpg','news-700x435-2.jpg','news-500x280-6.jpg','news-500x280-5.jpg','news-500x280-4.jpg','news-500x280-3.jpg','news-500x280-2.jpg'
            ]),
            'text' => fake()->paragraph().'\n'.fake()->paragraph(),

            'category_id' => rand(1,4),
            'user_id' => 1
        ];
    }
}
