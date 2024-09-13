<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(PermissionTableSeeder::class);
        $role = Role::create([
            'name' => config('permission.super_role_admin'),
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions(Permission::get());
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'super_admin@admin.com',
            'username' => 'super_admin',
            'phone_number' => '009723448524',
            'password'=>Hash::make('123123'),
        ]);
        

    }
}
