<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;


class CommentFactory extends Factory{

    protected $model = Comment::class;
    
    public function definition(): array
    {
        return [
            'comment' => fake()->paragraph(),
            'post_id' => Post::all()->random(1)->first()->id,
            'user_id' => User::all()->random(1)->first()->id,
        ];
    }
}
