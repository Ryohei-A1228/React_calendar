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
                'dateTime' => '2021-9-11 14:00:00'
            ],
            [
                'user_id' => 2,
                'title' => 'ドライブ',
                'dateTime' => '2021-9-24 14:00:00'
            ],
            [
                'user_id' => 1,
                'title' => '飲み会',
                'dateTime' => '2021-9-22 17:00:00'
            ],
        ];

        foreach($dataset as $data) {
            Event::create($data);
        }
    }
}
