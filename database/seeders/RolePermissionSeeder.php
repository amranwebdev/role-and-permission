<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $SuperAdminrole = Role::create(['name' => 'Superadmin']);
        $Adminrole = Role::create(['name' => 'Admin']);
        $Userrole = Role::create(['name' => 'User']);


        //permission as array
        $permissions = [

            'dashboard-view',

            'admin-create',
            'admin-view',
            'admin-edit',
            'admin-delete',
            'admin-approve',

            'blog-create',
            'blog-view',
            'blog-edit',
            'blog-delete',
            'blog-approve',

            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-approve',

            'profile-view',
            'profile-edit',
         ];

        //assign permissions
        for($i = 0; $i < count($permissions); $i++){
           $permission = Permission::create(['name' => $permissions[$i]]);
           $SuperAdminrole->givePermissionTo($permission);
           $permission->assignRole($SuperAdminrole); 

        }
    }
}
