<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

        // Content Permissions
        Permission::query()->firstOrCreate(['name' => 'content.create', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'content.view', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'content.edit', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'content.delete', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'content.publish', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'content.unpublish', 'guard_name' => 'admins']);

        // User Permissions
        Permission::query()->firstOrCreate(['name' => 'user.create', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'user.view', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'user.edit', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'user.delete', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'user.block', 'guard_name' => 'admins']);

        // Permission Permissions
        Permission::query()->firstOrCreate(['name' => 'permission.create', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'permission.view', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'permission.edit', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'permission.delete', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'permission.assign', 'guard_name' => 'admins']);

        // Role Permissions
        Permission::query()->firstOrCreate(['name' => 'role.create', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'role.view', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'role.edit', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'role.delete', 'guard_name' => 'admins']);
        Permission::query()->firstOrCreate(['name' => 'role.assign', 'guard_name' => 'admins']);
    }
}
