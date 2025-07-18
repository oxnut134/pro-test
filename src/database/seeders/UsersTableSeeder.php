<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        $param = [
            'name' => 'Cat',
            'email' => 'cat@test.com',
            'password' => bcrypt('abc12345'),
            'password_confirmation' => bcrypt('abc12345'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ];
        DB::table('users')->insert($param);
        //1
        $param = [
            'name' => 'Dog',
            'email' => 'dog@test.com',
            'password' => bcrypt('abc12345'),
            'password_confirmation' => bcrypt('abc12345'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ];
        DB::table('users')->insert($param);
        //1
        $param = [
            'name' => 'Tiger',
            'email' => 'tiger@test.com',
            'password' => bcrypt('abc12345'),
            'password_confirmation' => bcrypt('abc12345'),
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ];
        DB::table('users')->insert($param);
        //1
        $param = [
            'name' => 'Wolf',
            'email' => 'wolf@test.com',
            'password' => 'abc12345',
            'password_confirmation' => 'abc12345',
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ];
        DB::table('users')->insert($param);
    }
}
