<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Tag;
use App\Models\User;
use App\Models\Dashboard\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Tag::factory(30)->create();
        $this->call([
            // StoreSeeder::class,
            // RolesAndPermissionsSeeder::class,
            // UserSeeder::class,
        ]);
        Product::factory(50)->create();
        Store::factory(3)->create();

    }
}
