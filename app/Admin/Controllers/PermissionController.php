<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/14
 * Time: 18:00
 */
namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use function Sodium\compare;

class PermissionController extends Controller
{
    //权限列表
    public function index()
    {
        $permissions = \App\AdminPermission::paginate(10);
        return view('/admin/permission/index',compact('permissions'));
    }
    //创建权限
    public function create()
    {
        return view('/admin/permission/add');
    }
    //创建权限行为
    public function store()
    {
        //验证
        $this->validate(request(),[
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        //逻辑
        \App\AdminPermission::create(request(['name', 'description']));

        //渲染
        return redirect('/admin/permissions');
    }
}
