<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->text(40),
            'user_id' => 2,
            'category_id' => $this->faker->numberBetween(1, $max = 7),
            'description' => $this->faker->paragraph(50),
            'price' => $this->faker->numberBetween(34, $max = 790),
            'image_src' => '/images/placeholder.jpg',
        ];
    }
}
