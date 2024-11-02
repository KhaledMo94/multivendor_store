<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // User permissions
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',

            // Role permissions
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',

            // Permission permissions
            'permission.view',
            'permission.create',
            'permission.edit',
            'permission.delete',

            // Post permissions
            'product.view',
            'product.create',
            'product.edit',
            'product.delete',

            // Comment permissions
            'comment.view',
            'comment.create',
            'comment.edit',
            'comment.delete',
            'comment.approve',
            'comment.disapprove',

            // Category permissions
            'category.view',
            'category.create',
            'category.edit',
            'category.delete',

            // Order permissions
            'order.view',
            'order.create',
            'order.edit',
            'order.delete',
            'order.complete',
            'order.cancel',

            // Setting permissions
            'setting.view',
            'setting.update',

            // Report permissions
            'report.view',
            'report.generate',

            // Tag permissions
            'tag.view',
            'tag.create',
            'tag.edit',
            'tag.delete',

            // Dashboard permissions
            'dashboard.view',

            // Notification permissions
            'notification.view',
            'notification.send',

            // Additional permissions
            'file.upload',
            'file.download',
            'audit.view',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name'      =>$permission]);
        }

        $roles = [
            'super_admin','store_admin','customer','moderator',
            'sales_manager','delivery','accountant',
        ];

        foreach ($roles as $role){
            Role::create(['name'             =>$role]);
        }

    }
}
