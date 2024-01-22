<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ariel audhia',
            'email' => 'aril@gmail.com',
            'password' => Hash::make('password'),
        ]);

        // Tambahkan pengguna lain jika diperlukan
    }
}
