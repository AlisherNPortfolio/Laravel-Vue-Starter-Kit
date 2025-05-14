<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class UserAndRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Model::unguard();

        $users = [
            [
                'name' => 'Alisher',
                'email' => 'alisher@mail.uz',
                'password' => Hash::make('Alsiher123'),
            ],
            [
                'name' => 'User',
                'email' => 'user@mail.uz',
                'password' => Hash::make(value: 'User123'),
            ],
        ];

        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();

        app()['cache']->forget('spatie.permission.cache');
        foreach ($users as $key => $user) {
            $userModel = User::query()->create($user);
            $userModel->assignRole("user");
        }

        Model::reguard();
    }
}
