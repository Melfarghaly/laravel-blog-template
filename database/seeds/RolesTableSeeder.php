<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::create(['name' => 'admin']);

        $permissions = Permission::all();
        $adminRole->syncPermissions($permissions);

        Role::create(['name' => 'editor']);
        Role::create(['name' => 'author']);

        $readerRole =  Role::create(['name' => 'reader']);
        // $permission = Permission::where('name', 'create comments')->get();
        $readerRole->givePermissionTo('create comments');

    }
}
