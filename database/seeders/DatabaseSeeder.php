<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

        Tweet::factory()
            ->set('created_by', User::query()->first())
            ->count(400)
            ->create();
    }
}
