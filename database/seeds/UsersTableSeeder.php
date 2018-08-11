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
            'name' => 'Dan J. Hamilton',
            'username' => 'Dan',
            'email' => 'dhamilton@yahoo.com',
            'email_confirmed' => 1,
            'password' => bcrypt('password'),
            'role_confirmed' => 1,
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Celia A. Hamilton',
            'username' => 'Celia',
            'email' => 'cahamilton@gmail.com',
            'email_confirmed' => 1,
            'password' => bcrypt('password'),
            'role_confirmed' => 1,
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Theodore Hamilton',
            'username' => 'TJ',
            'email' => 'thamilton@gmail.com',
            'email_confirmed' => 1,
            'password' => bcrypt('password'),
            'role_confirmed' => 1,
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Sam Hamilton',
            'username' => 'Sam',
            'email' => 'shamilton@gmail.com',
            'email_confirmed' => 1,
            'password' => bcrypt('password'),
            'role_confirmed' => 1,
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Kimberly Hamilton',
            'username' => 'Kim',
            'email' => 'khamilton@gmail.com',
            'email_confirmed' => 1,
            'password' => bcrypt('password'),
            'role_confirmed' => 1,
            'remember_token' => str_random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
