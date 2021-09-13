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
            [
                'firstName'=> 'John',
                'lastName'=> 'Doe',
                'age'=> 25,
                'avatar_id'=> 1,
                'role_id'=> 1,
                'email'=> 'admin@admin.com',
                'password'=> Hash::make('admin@admin.com'),
            ],
            [
                'firstName'=> 'Patrick',
                'lastName'=> 'Doe',
                'age'=> 22,
                'avatar_id'=> 2,
                'role_id'=> 2,
                'email'=> 'membre@membre.com',
                'password'=> Hash::make('membre@membre.com'),
            ],
        ]);

    }
}
