<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/16
 * Time: 14:17
 */

namespace App\Admin\Controllers;
use \App\AdminUser;

class TopicController extends Controller
{
    //列表页面
    public function index()
    {
        $topics = \App\Topic::paginate(10);
        return view('admin/topic/index',compact('topics'));
    }

    //增加
    public function create()
    {
        return view('admin/topic/create');
    }

    //储存方式
    public function store()
    {
        //验证
        $this->validate(request(),[
            'name'=>'required|string'
        ]);
        //逻辑
        \App\Topic::create(['name'=>request('name')]);

        //渲染
        return redirect("admin/topics");
    }

    // 删除
    public function destroy(\App\Topic $topic)
    {
        $topic->delete();

        return [
            'error'=>0,
            'msg'=>''
        ];
    }
}