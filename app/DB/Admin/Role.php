<?php

namespace App\DB\Admin;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * @package App\DB\Admin
 */
class Role extends Model
{
    /**
     * @var string
     */
    protected $table = 'roles';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\DB\Admin\User','role_user','user_id','role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
   /* public function permissions(){
        return $this->belongsToMany('App\DB\Admin\Permission','role_permissions','role_id','permission_id');
    }*/

    public function role_permission()
    {
        return $this->hasOne('App\DB\Admin\RolePermission');
    }
}
