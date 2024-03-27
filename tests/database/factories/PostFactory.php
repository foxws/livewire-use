<?php

namespace Foxws\LivewireUse\Database\Factories;

use Foxws\LivewireUse\Tests\Models\Post;
use Foxws\LivewireUse\Tests\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'author_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(),
            'is_published' => $this->faker->boolean(),
            'tags' => $this->faker->words(),
            'rating' => $this->faker->numberBetween(1, 10),
        ];
    }
}