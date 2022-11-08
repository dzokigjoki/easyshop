<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    public function roles() {
        return $this->belongsToMany('EasyShop\Models\Role', 'permission_role', 'permission_id', 'role_id');
    }
    
    public function preparePermissionsForDisplay($permissions)
    {
        // Get all the available permissions
        $availablePermissions = $this->all()->toArray();

        foreach($permissions as &$permission) {
            array_walk($availablePermissions, function(&$value) use(&$permission){
                if($permission->name == $value['name']) {
                    $value['checked'] = true;
                }
            });
        }
        return $availablePermissions;
    }

    /**
     * Convert from input array to savable array.
     * @param $permissions
     * @return array
     */
    public function preparePermissionsForSave( $permissions )
    {
        $availablePermissions = $this->all()->toArray();
        $preparedPermissions = [];

        foreach ($availablePermissions as $permission) {
            $preparedPermissions[] = $permission['id'];
        }


        return array_intersect($permissions, $preparedPermissions);

        // dd($availablePermissions);

        // foreach( $permissions as $permission )
        // {
        //     // If checkbox is selected
        //     if( $permission == '1' )
        //     {
        //         // If permission exists
        //         array_walk($availablePermissions, function(&$value) use($permission, &$preparedPermissions){
        //             if($permission == (int)$value['id']) {
        //                 $preparedPermissions[] = $permission;
        //             }
        //         });
        //     }
        // }
        // return $preparedPermissions;
    }
}
