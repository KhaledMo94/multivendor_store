<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'              =>'khaled',
            'email'             =>'khaledyoosef94@gmail.com',
            'password'          =>Hash::make('password'),
        ]);

        // User::factory(10)->create();

        // User::factory(5)->create();

        // User::factory()->count(20)->create();

    }
}
