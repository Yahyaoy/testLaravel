<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // User::factory() only don't add lazy or create (As jeffrey way)
            'user_id' => User::factory()->lazy(), // lazy to let me to add name from seeder
            'category_id' => Category::factory()->create(),
            'title' => fake()->sentence,
            'slug' => fake()->slug,
            'excerpt' => '<p>'. implode('</p><p>', fake()->paragraphs(2)) . '</p>',
//             another solution from laracast website
//            'excerpt' => collect($this->faker->paragraphs(2))->map(fn($item) => "<p>{$item}</p>")->implode(''),
            'body' => '<p>'. implode('</p><p>', fake()->paragraphs(6)) . '</p>',
        ];
    }
}
