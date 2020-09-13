<?php

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
        DB::table('users')->insert([
            [
            'name' => '更木剣八',
            'email' => 'test1@example.com',
            'password' => Hash::make('password15'),
            ],
            [
            'name' => 'チャド',
            'email' => 'test2@example.com',
            'password' => Hash::make('password15'),
            ],
            [
            'name' => '黒崎一護',
            'email' => 'test3@example.com',
            'password' => Hash::make('password15'),
            ],
            [
            'name' => '藍染惣右介',
            'email' => 'test4@example.com',
            'password' => Hash::make('password15'),
            ],
            [
            'name' => 'チャド',
            'email' => 'test5@example.com',
            'password' => Hash::make('password15'),
            ],
        ]);
    }
}
