<?php

use Illuminate\Database\Seeder;
use EasyShop\Models\Role;
use EasyShop\Models\Permission;
use EasyShop\Models\PermissionRoles;

class DashboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $permissions = 
            [
                'name'              => 'dashboard',
                'menu'              => 'Контролна табла',
                'display_name'      => 'Контролна табла'
            ]
        ;
        
        $check = Permission::where('name','dashboard')->first();
        if(empty($check))
        {
            $perminssion_id = DB::table('permissions')->insertGetId( $permissions );
        } else 
            $perminssion_id = $check->id;
        
        $roles = Role::all();
        foreach($roles as $role)
        {
            $pr = PermissionRoles::where('permission_id',$perminssion_id)->where('role_id',$role->id)->count();
            if(empty($pr))
            {
                PermissionRoles::insert(['permission_id'=>$perminssion_id,'role_id'=>$role->id]);
            }
        }
    }
}
