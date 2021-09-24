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
                'name' => 'アベ',
                'email' => 'abe@example.com',
                'password' => bcrypt('passwordabe')
            ],
            [
                'name' => 'リョウヘイ',
                'email' => 'ryohei@example.com',
                'password' => bcrypt('passwordryohei')
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
