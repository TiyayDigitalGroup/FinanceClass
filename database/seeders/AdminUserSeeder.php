<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(['name' => 'administrator']);

        User::firstOrCreate(
            ['email' => 'admin@finance.class'],
            [
                'name'     => 'Administrador',
                'password' => Hash::make('financeClass'),
                'role_id'  => $adminRole->id,
            ]
        );
    }
}
