<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class GamesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $imageNames = ['1697468286-wdadwad.jpg', '1697468399-newest.jpg', '1697711079-Jayden Blom.png', '1697711130-Jayden blom.png', '1697714915-REALISTIC HOOD TESTING [HALLOWEEN].png', '1697718319-Wowowow.jpg', '1697718330-Wowowow.jpg', '1697718346-Wowowow.png', '1698058561-Blade ball.png', '1698061563-Jayden Blom.png'];
        for ($i = 0; $i < 10; $i++) {
            // Get a list of all files in the images directory

            $imageName = $imageNames[array_rand($imageNames)];

            DB::table('games')->insert([

                'name' => $faker->sentence(1),
                'description' => $faker->paragraph(3),
                'likes' => $faker->numberBetween(0, 100),
                'play_count' => $faker->numberBetween(0, 1000),
                'image_link' => $imageName,
                'type' => $faker->randomElement(['Action', 'Adventure', 'RPG']),
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
