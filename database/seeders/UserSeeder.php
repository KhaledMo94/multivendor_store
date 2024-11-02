<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name'              =>'super_admin',
        //     'email'             =>'super_admin@gmail.com',
        //     'password'          =>Hash::make('password'),
        //     'store_id'          =>1,
        // ])->assignRole('super_admin');
        // User::create([
        //     'name'              =>'store_admin',
        //     'email'             =>'store_admin@gmail.com',
        //     'password'          =>Hash::make('password'),
        //     'store_id'          =>1,
        // ])->assignRole('store_admin');
        // User::create([
        //     'name'              =>'customer',
        //     'email'             =>'customer@gmail.com',
        //     'password'          =>Hash::make('password'),
        //     'store_id'          =>1,
        // ])->assignRole('customer');
        User::create([
            'name'              =>'moderator2',
            'email'             =>'moderator2@gmail.com',
            'store_id'          =>1,
            'password'          =>Hash::make('password'),
        ])->assignRole('moderator');
        // User::create([
        //     'name'              =>'sales_manager',
        //     'email'             =>'sales_manager@gmail.com',
        //     'store_id'          =>1,
        //     'password'          =>Hash::make('password'),
        // ])->assignRole('sales_manager');
        // User::create([
        //     'name'              =>'delivery',
        //     'email'             =>'delivery@gmail.com',
        //     'store_id'          =>1,
        //     'password'          =>Hash::make('password'),
        // ])->assignRole('delivery');
        // User::create([
        //     'name'              =>'accountant',
        //     'store_id'          =>1,
        //     'email'             =>'accountant@gmail.com',
        //     'password'          =>Hash::make('password'),
        // ])->assignRole('accountant');

    }
}
