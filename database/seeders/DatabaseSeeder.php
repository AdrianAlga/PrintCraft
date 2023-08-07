<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "username" => "admin",
            "password" => Hash::make("password"),
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "level" => 0,
        ]);
        User::create([
            "username" => "user",
            "password" => Hash::make("password"),
            "name" => "user",
            "email" => "user@gmail.com",
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
