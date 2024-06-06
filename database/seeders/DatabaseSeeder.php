<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Student::factory(10)->create();
        \App\Models\Assist::factory(20)->create();
        \App\Models\Parameter::factory(1)->create();
        \App\Models\User::factory(1)->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'rol'=> 'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::factory(1)->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => bcrypt('user'),
            'rol'=> 'user',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        //\App\Models\User::factory(20)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
