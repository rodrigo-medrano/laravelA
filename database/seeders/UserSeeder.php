<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::create([
            'name'=>fake()->name(),
            'email'=>fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'=>bcrypt('123'),
            'remember_token' => Str::random(10),
        ]);
    }
}
