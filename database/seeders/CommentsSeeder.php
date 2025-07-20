<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Ganti dengan UUID post dan user yang valid
        $userId = 'e55ffe3d-0389-4799-b555-0dd316a69370';
        $postId = 'a053b785-f048-47c1-b72b-c429171edf92';

        DB::table('comments')->insert([
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'post_id' => $postId,
                'user_id' => $userId,
                'content' => $faker->text(50),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            // Tambahkan data lain jika perlu
        ]);
    }
}
