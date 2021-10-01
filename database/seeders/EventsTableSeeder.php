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
                'date' => '20211011',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 2,
                'title' => 'ドライブ',
                'date' => '20211003',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'date' => '20211022',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 3,
                'title' => '飲み会',
                'date' => '20211012',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 4,
                'title' => '飲み会',
                'date' => '20211027',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 5,
                'title' => '飲み会',
                'date' => '20211022',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 3,
                'title' => 'ドライブ',
                'date' => '20211009',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 4,
                'title' => 'ドライブ',
                'date' => '20211019',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 5,
                'title' => 'ドライブ',
                'date' => '20211024',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 2,
                'title' => '飲み会',
                'date' => '20211011',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 5,
                'title' => '飲み会',
                'date' => '20211027',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 2,
                'title' => '飲み会',
                'date' => '20211012',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'date' => '20211020',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 4,
                'title' => '飲み会',
                'date' => '20211031',
                'start_time' => 17,
                'end_time' => 20
            ],
            [
                'user_id' => 3,
                'title' => '飲み会',
                'date' => '20211022',
                'start_time' => 17,
                'end_time' => 20
            ],
            
        ];

        foreach($dataset as $data) {
            Event::create($data);
        }
    }
}
