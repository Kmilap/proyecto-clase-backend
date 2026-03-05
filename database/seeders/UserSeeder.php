<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user1 = new User();
        $user1->name     = 'Carlos García';
        $user1->email    = 'carlos@email.com';
        $user1->password = Hash::make('password123');
        $user1->save();

        $user2 = new User();
        $user2->name     = 'María López';
        $user2->email    = 'maria@email.com';
        $user2->password = Hash::make('password123');
        $user2->save();

        $user3 = new User();
        $user3->name     = 'Juan Pérez';
        $user3->email    = 'juan@email.com';
        $user3->password = Hash::make('password123');
        $user3->save();
    }
}