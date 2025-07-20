<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        DB::table('posts')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => 'e55ffe3d-0389-4799-b555-0dd316a69370', // ganti dengan UUID user yang valid
                'content' => $faker->text(30),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            // Tambahkan data lain jika perlu
        ]);
    }
}
