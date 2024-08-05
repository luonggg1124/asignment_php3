<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->paragraph,
            'image' => 'img/news-500x280-2.jpg',
            'image_side' => fake()->randomElement(['left','right']),
            'content' => fake()->paragraph().'\n'.fake()->paragraph(),
            'news_id' => rand(1,10)
        ];
    }
}
