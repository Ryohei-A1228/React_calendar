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
                'date' => '2021-9-11',
                'time' => 17
            ],
            [
                'user_id' => 2,
                'title' => 'ドライブ',
                'date' => '2021-9-24',
                'time' => 14
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'date' => '2021-9-22',
                'time' => 17
            ],
        ];

        foreach($dataset as $data) {
            Event::create($data);
        }
    }
}
