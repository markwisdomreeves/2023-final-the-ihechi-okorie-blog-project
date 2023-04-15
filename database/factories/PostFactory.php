<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;


use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory{

    protected $model = Post::class;
    
    public function definition(): array{
        return [
           'title' => fake()->sentence(),
           'slug' => fake()->unique()->slug(),
           'excerpt' => fake()->sentence(),
           'description' => fake()->paragraph(),
           'user_id' => User::factory(),
           'category_id' => Category::all()->random()->id,
        ];
    }
}
