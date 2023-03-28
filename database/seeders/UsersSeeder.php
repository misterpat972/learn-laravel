<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->name = Str::random(10);
            $user->email = Str::random(10).'@gmail.com';
            $user->password = Hash::make('password');
            $user->save();
        }
        
        
    }
}
