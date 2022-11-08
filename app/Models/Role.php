<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 'admin';

    /**
     * Get the permissions associated with role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions()
    {
        return $this->belongsToMany('EasyShop\Models\Permission', 'permission_role', 'role_id', 'permission_id');
    }
    
    /**
     * 
     * @return type
     */
    public function users() {
        return $this->belongsToMany('EasyShop\Models\Role', 'assigned_roles', 'role_id', 'user_id');
    }


    /**
     * Provide an array of strings that map to valid roles.
     * @param array $roles
     * @return stdClass
     */
//    public function validateRoles( array $roles )
//    {
//        $user = Confide::user();
//        $roleValidation = new stdClass();
//        foreach( $roles as $role )
//        {
//            // Make sure theres a valid user, then check role.
//            $roleValidation->$role = ( empty($user) ? false : $user->hasRole($role) );
//        }
//        return $roleValidation;
//    }
}
