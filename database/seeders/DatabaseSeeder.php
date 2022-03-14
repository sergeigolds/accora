<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'title' => 'Toys',
            'alias' => 'toys',
            'image' => 'toys.png',
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'title' => 'Cloths',
            'alias' => 'cloths',
            'image' => 'cloths.png',
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'title' => 'Electronics',
            'alias' => 'electronics',
            'image' => 'electronics.png',
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'title' => 'Cars',
            'alias' => 'cars',
            'image' => 'cars.png',
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'title' => 'Bicycles',
            'alias' => 'bicycles',
            'image' => 'bicycles.png',
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'title' => 'Furniture',
            'alias' => 'furniture',
            'image' => 'furniture.png',
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'title' => 'Pets',
            'alias' => 'pets',
            'image' => 'pets.png',
        ]);

        \App\Models\User::factory(7)->create();
        \App\Models\Ad::factory(200)->create();

    }
}
