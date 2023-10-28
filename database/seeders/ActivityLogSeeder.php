<?php

namespace Database\Seeders;

use App\Models\ActivityLog;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActivityLogSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $types = ['login', 'register', 'logout', 'update', 'delete'];
        $userIDs = [1, 2, 3];

        for ($i = 0; $i < 100; $i++) {
            ActivityLog::insert([
                'user_id' => $faker->randomElement($userIDs),
                'activity' => 'Test',
                'type' => $faker->randomElement($types),
                'data' => json_encode(['ip_address' => '127.0.0.1']),
                'created_at' => now(),
            ]);
        }
    }
}
