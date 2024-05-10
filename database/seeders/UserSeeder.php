<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'age' => 30,
            'phone' => '1234567890',
            'email' => 'admin@softui.com',
            'role' => 'admin',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Lecturer 1',
            'age' => 40,
            'phone' => '1234560987',
            'email' => 'lec@gmail.com',
            'role' => 'lecturer',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Lecturer 2',
            'age' => 45,
            'phone' => '1234564545',
            'email' => 'lec2@gmail.com',
            'role' => 'lecturer',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Student',
            'age' => 22,
            'phone' => '1234561243',
            'email' => 'stu@gmail.com',
            'role' => 'student',
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
