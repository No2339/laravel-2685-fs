<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PostStatus;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostStatus>
 */
class PostStatusFactory extends Factory
{
    protected $model = PostStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' =>fake()->randomElement(['draft', 'published', 'archived']),
        ];
    }
}
