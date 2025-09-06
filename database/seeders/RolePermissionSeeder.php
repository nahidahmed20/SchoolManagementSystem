<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Role mapping
        $roleMap = [
            1 => 'superadmin',
            2 => 'school',
            3 => 'schooladmin',
            4 => 'teacher',
            5 => 'student',
            6 => 'parent',
        ];

        foreach ($roleMap as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        $users = User::all();

        foreach ($users as $user) {
            if (isset($roleMap[$user->is_admin])) {
                $user->syncRoles([$roleMap[$user->is_admin]]);
            }
        }
    }
}
