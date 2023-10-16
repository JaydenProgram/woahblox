<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            $imageUrl = "https://picsum.photos/150/150"; // Generates a random 800x600 image
            DB::table('games')->insert([
                'name' => $faker->sentence(1),
                'description' => $faker->paragraph(3),
                'likes' => $faker->numberBetween(0, 100),
                'play_count' => $faker->numberBetween(0, 1000),
                'image_link' => $imageUrl,
                'type' => $faker->randomElement(['Action', 'Adventure', 'RPG']),
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
