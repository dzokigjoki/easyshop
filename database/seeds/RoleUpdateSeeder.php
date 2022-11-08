<?php

use EasyShop\Models\PermissionRoles;
use EasyShop\Models\Permission;
use EasyShop\Models\Role;
use Illuminate\Database\Seeder;


class RoleUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();
        $permission->name = 'lista_na_naracki';
        $permission->display_name = 'Листа на нарачки';
        $permission->menu = 'Продажба';
        $permission->save();

        $permissionRole = new PermissionRoles();
        $permissionRole->permission_id = $permission->id;
        $permissionRole->role_id = Role::where('name', 'admin')->first()->id ;
        $permissionRole->save();
    }
}
