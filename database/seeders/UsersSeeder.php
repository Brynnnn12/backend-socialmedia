<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        DB::table('users')->insert([
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Ganti dengan password yang sesuai
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Tambahkan data lain jika perlu
        ]);
    }
}
