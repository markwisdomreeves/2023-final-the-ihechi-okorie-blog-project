<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\User;


class CategoryFactory extends Factory{

    protected $model = Category::class;

    public function definition(): array{
        return [
            'name' => fake()->word(),
            'slug' => fake()->unique()->slug(),
            'user_id' => User::all()->random()->id
        ];
    }
}
