<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(config('permission.default_permission') as $permission)
        {
            Permission::create([
                'name' => $permission
            ]);
        }

        foreach(config('permission.default_roles') as $role){
            Role::create([
                'name' => $role
            ]);
        }
    }
}
