<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();
        $user = [[
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => Hash::make('user'),
            'usertype' => 'dosen',
        ],[
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin'),
            'usertype' => 'admin',
        ],[
            'name' => 'fakultas',
            'email' => 'fakultas@mail.com',
            'password' => Hash::make('fakultas'),
            'usertype' => 'fakultas',
        ]
        ,[
            'name' => 'prodi',
            'email' => 'prodi@mail.com',
            'password' => Hash::make('prodi'),
            'usertype' => 'prodi',
        ]];

        user::insert($user);
    }
}
