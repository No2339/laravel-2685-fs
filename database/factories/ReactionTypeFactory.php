<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReactionType>
 */
class ReactionTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
        'type'=>fake()->randomElement(['like', 'love', 'haha', 'wow', 'sad', 'angry', 'fire', 'clap'])
            
        ];
    }
}
