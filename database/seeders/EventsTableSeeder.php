<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
                'title' => 'バイト',
                'date' => '20210911',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 2,
                'title' => 'ドライブ',
                'date' => '20210924',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'date' => '20210922',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 3,
                'title' => '飲み会',
                'date' => '20210912',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 4,
                'title' => '飲み会',
                'date' => '20210927',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 5,
                'title' => '飲み会',
                'date' => '20210922',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 3,
                'title' => 'ドライブ',
                'date' => '20210909',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 4,
                'title' => 'ドライブ',
                'date' => '20210919',
                'start_time' => 17,
                'end_time' => 20
            ],
            
        ];

        foreach($dataset as $data) {
            Event::create($data);
        }
    }
}
