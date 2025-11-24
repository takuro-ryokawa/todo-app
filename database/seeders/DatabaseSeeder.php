<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TodoList;
use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $User = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);
        TodoList::factory()
            ->count(5)
            ->for($User)
            ->has(Todo::factory()->count(3),'todos')
            ->create();
    }
}
