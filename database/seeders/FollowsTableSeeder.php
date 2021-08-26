<?php

namespace Database\Seeders;

use App\Models\Follow;
use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataset = [
            [
                'user_id' => 1,
                'user_following_id' => 2
            ],
            [
                'user_id' => 3,
                'user_following_id' => 2
            ],
            [
                'user_id' => 2,
                'user_following_id' => 3
            ],
            [
                'user_id' => 2,
                'user_following_id' => 1
            ],
        ];

        foreach($dataset as $data) {
            Follow::create($data);
        }
    }
}
