<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Image;


class ImageFactory extends Factory{

    protected $model = Image::class;
    
    public function definition(): array{

        $fake_images = [
            'blog-1.jpg',
            'blog-2.jpg',
            'blog-3.jpg',
            'blog-4.jpg',
            'blog-5.jpg'
        ];

        return [
           'image' => fake()->word(),
           'extension' => 'jpg',
           'path' => 'uploads/' . fake()->randomElement($fake_images)
        ];
    }
}
