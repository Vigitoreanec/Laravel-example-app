<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {

            DB::table('posts')->insert([
                'title' => fake()->realText(30),
                'text' => fake()->realText(255),
                'category_id' => Category::inRandomOrder()->first()->id,
            ]);
        }
    }
}
