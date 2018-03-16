<?php

namespace App;



class AdminRole extends Model
{
    protected $table = "admin_roles";

    //当前角色的所有权限
    public function permissions()
    {
        return $this->belongsToMany(\App\AdminPermission::class, 'admin_permission_roles', 'role_id', 'permission_id')->withPivot(['permission_id', 'role_id']);
    }

    //给角色授予权限
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);
    }

    //删除角色的权限
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);
    }

    //角色是否有权限
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission);
    }

}
