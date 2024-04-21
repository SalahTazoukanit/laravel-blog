<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Categorie;
use App\Models\Post;
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
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'content'=>fake()->sentence(),
            'description'=>fake()->paragraph(),
            'image'=>fake()->imageUrl(),
            // 'user_id'=>user()->random(1,10),
            'user_id'=>User::all()->random()->id,
            // 'categorie_id'=>Categorie::all()->random()->id,
            // 'categorie_id'=>fake()->randomDigit(),
        ];
    }
}
