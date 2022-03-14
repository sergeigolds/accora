<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    public function definition()
    {
        return [
            [
                'id' => 1,
                'title' => 'Toys',
                'alias' => 'toys',
                'image' => 'toys.png',
            ],
            [
                'id' => 2,
                'title' => 'Cloths',
                'alias' => 'cloths',
                'image' => 'cloths.png',
            ],
            [
                'id' => 3,
                'title' => 'Electronics',
                'alias' => 'electronics',
                'image' => 'electronics.png',
            ],
            [
                'id' => 4,
                'title' => 'Cars',
                'alias' => 'cars',
                'image' => 'cars.png',
            ],
            [
                'id' => 5,
                'title' => 'Bicycles',
                'alias' => 'bicycles',
                'image' => 'bicycles',
            ],
            [
                'id' => 6,
                'title' => 'Furniture',
                'alias' => 'furniture',
                'image' => 'furniture.png',
            ],
            [
                'id' => 7,
                'title' => 'Pets',
                'alias' => 'pets',
                'image' => 'pets.png',
            ],
        ];
    }
}
