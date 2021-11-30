<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(1)
            ->user()
            ->hasBoards(10)
            ->create();
        User::factory()
            ->count(3)
            ->hasBoards(10)
            ->create();
    }
}
