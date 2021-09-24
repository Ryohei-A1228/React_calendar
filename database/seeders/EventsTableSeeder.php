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
                'time' => 17
            ],
            [
                'user_id' => 2,
                'title' => 'ドライブ',
                'date' => '20210924',
                'time' => 14
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'date' => '20210922',
                'time' => 17
            ],
            [
                'user_id' => 3,
                'title' => '飲み会',
                'date' => '20210912',
                'time' => 17
            ],
            [
                'user_id' => 4,
                'title' => '飲み会',
                'date' => '20210927',
                'time' => 19
            ],
            [
                'user_id' => 5,
                'title' => '飲み会',
                'date' => '20210922',
                'time' => 17
            ],
            [
                'user_id' => 3,
                'title' => 'ドライブ',
                'date' => '20210909',
                'time' => 10
            ],
            [
                'user_id' => 4,
                'title' => 'ドライブ',
                'date' => '20210919',
                'time' => 9
            ],
            
        ];

        foreach($dataset as $data) {
            Event::create($data);
        }
    }
}
