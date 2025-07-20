<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // Ganti dengan UUID sender dan receiver yang valid
        $senderId = 'e55ffe3d-0389-4799-b555-0dd316a69370';
        $receiverId = 'a053b785-f048-47c1-b72b-c429171edf92';

        DB::table('messages')->insert([
            [
                'id' => \Illuminate\Support\Str::uuid(),
                'sender_id' => $senderId,
                'receiver_id' => $receiverId,
                'content' => $faker->text(100),
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => null
            ],
            // Tambahkan data lain jika perlu
        ]);
    }
}
