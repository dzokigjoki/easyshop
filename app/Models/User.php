<?php

namespace EasyShop\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable implements JWTSubject
{

    const GUEST_ID = 2;
    use SoftDeletes;  
    protected $dates = ['deleted_at'];  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'confirmation_code',
        'company',
        'role',
        'confirmed',
        'phone',
        'first_name',
        'last_name',
        'city_id',
        'country_id',
        'city_other',
        'zip_other',
        'country_other',
        'address',
        'city_id_shipping',
        'country_id_shipping',
        'city_other_shipping',
        'zip_other_shipping',
        'country_other_shipping',
        'address_shiping',
        'gender',
        'type',
        'nacin_plakanje',
        'danocen_broj',
        'website',
        'note',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the roles associated with the given user
     *
     * @access public
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('EasyShop\Models\Role', 'assigned_roles', 'user_id', 'role_id');
    }


    /**
     * Checks if the user has any role
     *
     * @access public
     * @return boolean
     */
    public function hasAnyRole()
    {
        return count($this->roles) > 0;
    }


    /**
     * Checks if the user has a Role by its name
     *
     * @param string $name Role name.
     *
     * @access public
     *
     * @return boolean
     */
    public function hasRole($name)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $name) {
                return true;
            }
        }

        return false;
    }

    /**
     * Alias to eloquent many-to-many relation's
     * attach() method
     *
     * @param mixed $role
     *
     * @access public
     *
     * @return void
     */
    public function attachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->attach($role);
    }

    /**
     * Alias to eloquent many-to-many relation's
     * detach() method
     *
     * @param mixed $role
     *
     * @access public
     *
     * @return void
     */
    public function detachRole($role)
    {
        if (is_object($role)) {
            $role = $role->getKey();
        }

        if (is_array($role)) {
            $role = $role['id'];
        }

        $this->roles()->detach($role);
    }

    /**
     * Attach multiple roles to a user
     *
     * @param $roles
     * @access public
     * @return void
     */
    public function attachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->attachRole($role);
        }
    }

    /**
     * Detach multiple roles from a user
     *
     * @param $roles
     * @access public
     * @return void
     */
    public function detachRoles($roles)
    {
        foreach ($roles as $role) {
            $this->detachRole($role);
        }
    }

    /**
     * Check if user has a permission by its name
     *
     * @param string $permission Permission string.
     *
     * @access public
     *
     * @return boolean
     */
    public function canDo($permission)
    {
        foreach ($this->roles as $role) {

            // Deprecated permission value within the role table.
            //            if( is_array($role->permissions) && in_array($permission, $role->permissions) )
            //            {
            //                return true;
            //            }

            // Validate against the Permission table
            foreach ($role->permissions as $perm) {
                if ($perm->name == $permission) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @param $array
     * @return array | boolean
     */
    public function permissions()
    {
        $permissions = [];

        foreach ($this->roles as $role) {
            foreach ($role->permissions as $perm) {
                array_push($permissions, $perm);
            }
        }
        return $permissions;
    }

    public function country()
    {
        return $this->belongsTo(\EasyShop\Models\Country::class, 'country_id');
    }

    public function documents()
    {
        return $this->hasMany(\EasyShop\Models\Document::class, 'created_by')->where(function($query) {
            $query->where('type', 'narachka')
            ->where(function($query) {
                $query->where('status', Document::STATUS_DOSTAVENA)
                ->orWhere('status', Document::STATUS_VRATENA);                
            })
            ->where('paid', 'platena');
        });
    }

    public function city()
    {
        return $this->belongsTo(\EasyShop\Models\City::class, 'city_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


}
