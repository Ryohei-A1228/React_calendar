<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'name' => 'とも',
                'email' => 'abe@example.com',
                'password' => bcrypt('passwordtomos')
            ],
            [
                'name' => 'りょうた',
                'email' => 'ryota@example.com',
                'password' => bcrypt('passwordryota')
            ],
            [
                'name' => 'カズキ',
                'email' => 'kazuki@example.com',
                'password' => bcrypt('passwordkazuki')
            ],
            [
                'name' => 'マコ',
                'email' => 'mako@example.com',
                'password' => bcrypt('passwordmako')
            ],
            [
                'name' => 'みき',
                'email' => 'miki@example.com',
                'password' => bcrypt('passwordmiki')
            ]
        ];

        foreach($dataset as $data) {
            User::create($data);
        }
    }
}
