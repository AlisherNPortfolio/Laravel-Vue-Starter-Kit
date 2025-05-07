<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $users = [
            [
                'name' => 'Superadmin',
                'email' => 'super@mail.uz',
                'password' => Hash::make('Superadmin123'),
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@mail.uz',
                'password' => Hash::make('Admin123'),
            ],
        ];

        $roles = [
            ['superadmin'],
            ['admin'],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('admin')->truncate();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        app()['cache']->forget('spatie.permission.cache');
        foreach ($users as $key => $user) {
            $userModel = Admin::query()->create($user);
            $userModel->assignRole($roles[$key]);
        }
    }
}
