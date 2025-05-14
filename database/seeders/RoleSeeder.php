<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();
        $this->call(PermissionSeeder::class);

        $this->assignPermissionsToRoles();
    }

    private function assignPermissionsToRoles()
    {
        [$superadmin, $admin, $moderator, $editor, $user, $guest] = $this->createRoles();
        $permissions = Permission::query()->get();
        $notAllowedPermissionsToAdmin = $this->notAllowedPermissions();

        foreach ($permissions as $permission) {
            // Hozircha faqat superadmin va adminga rol berilgan
            if ($permission->guard_name == 'admins' && !in_array($permission->name, $notAllowedPermissionsToAdmin)) {
                $permission->assignRole($admin);
            }
            if ($permission->guard_name == 'admins') {
                $permission->assignRole($superadmin);
            }

        }
    }

    private function createRoles()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();

        $superadmin = Role::query()->firstOrCreate(['name' => 'superadmin', 'guard_name' => 'admins']);
        $admin = Role::query()->firstOrCreate(['name' => 'admin', 'guard_name' => 'admins']);
        $moderator = Role::query()->firstOrCreate(['name' => 'moderator', 'guard_name' => 'admins']);
        $editor = Role::query()->firstOrCreate(['name' => 'editor', 'guard_name' => 'admins']);
        $user = Role::query()->firstOrCreate(['name' => 'user', 'guard_name' => 'api']);
        $guest = Role::query()->firstOrCreate(['name' => 'guest', 'guard_name' => 'api']);

        return [$superadmin, $admin, $moderator, $editor, $user, $guest];
    }

    private function notAllowedPermissions()
    {
        return [
            'content.edit',
            'content.delete',
            'user.delete',
            'permission.create',
            'permission.edit',
            'permission.delete',
            'role.create',
            'role.edit',
            'role.delete',
        ];
    }
}
