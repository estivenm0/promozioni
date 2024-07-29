<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MoonshineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('moonshine_user_roles')->insert([
            // [ 'name' => 'Admin' ],
            [ 'name' => 'Moderator' ],
        ]);
        
        DB::table('moonshine_users')->insert([
            [
                'moonshine_user_role_id' => 1,
                'name' => 'admin@gmail.com',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ],
            [
                'moonshine_user_role_id' => 2,
                'name' => 'moderator@gmail.com',
                'email' => 'moderator@gmail.com',
                'password' => Hash::make('12345678'),
                'created_at' => now()
            ]
        ]);
    }
}
