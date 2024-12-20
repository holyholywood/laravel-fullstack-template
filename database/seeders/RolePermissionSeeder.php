<?php

namespace Database\Seeders;

use App\Modules\Auth\Resource\AuthorizationResource;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = AuthorizationResource::getRoles();

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }


        $permissions = AuthorizationResource::getPermissions();

        $superUserRole = Role::where(['name' => env('DEFAULT_SUPERADMIN_ROLE_NAME', 'SUPER_ADMIN')])->first();
        foreach ($permissions as $permission) {
            $createdPermission = Permission::firstOrCreate(['name' => $permission]);
            $createdPermission->assignRole($superUserRole);
        }
    }
}
