<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        \Illuminate\Support\Facades\DB::table('roles')->truncate();
        $role = Role::create(['name' => 'admin']);

        \App\User::find(1)->assignRole($role);
    }
}
