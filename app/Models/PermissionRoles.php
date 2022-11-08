<?php

namespace EasyShop\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRoles extends Model
{
     /**
     * @var string
     */
    protected $table = 'permission_role';

    /**
     * @var bool
     */
    public $timestamps = false;
}
