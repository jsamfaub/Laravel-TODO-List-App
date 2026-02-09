<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);

        $users = User::all();

        foreach($users as $user) {
            $user->tasks()->create([
                'name' => fake()->unique()->name()
            ]);
            $user->tasks()->create([
                'name' => fake()->unique()->name()
            ]);
            $user->tasks()->create([
                'name' => fake()->unique()->name()
            ]);
        }
    }
}
