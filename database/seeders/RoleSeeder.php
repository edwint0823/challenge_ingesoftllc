<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin',]);
        $role_worker = Role::create(['name' => 'worker',]);

        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        $permission_create_user = Permission::create(['name' => 'create users']);
        $permission_read_user = Permission::create(['name' => 'read users']);
        $permission_update_user = Permission::create(['name' => 'update users']);
        $permission_delete_user = Permission::create(['name' => 'delete users']);

        $permission_create_task = Permission::create(['name' => 'create tasks']);
        $permission_read_task = Permission::create(['name' => 'read tasks']);
        $permission_update_task = Permission::create(['name' => 'update tasks']);
        $permission_delete_task = Permission::create(['name' => 'delete tasks']);

        $permissions_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_user,
            $permission_read_user,
            $permission_update_user,
            $permission_delete_user,
            $permission_create_task,
            $permission_read_task,
            $permission_update_task,
            $permission_delete_task,
        ];

        $permissions_worker = [
            $permission_create_task,
            $permission_read_task,
            $permission_update_task,
            $permission_delete_task,
        ];

        $role_admin->syncPermissions($permissions_admin);
        $role_worker->syncPermissions($permissions_worker);
    }
}
