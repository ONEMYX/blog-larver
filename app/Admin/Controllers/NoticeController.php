<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/16
 * Time: 14:17
 */

namespace App\Admin\Controllers;


class NoticeController extends Controller
{
    //列表页面
    public function index()
    {
        $notices = \App\Notice::all();
        return view('admin/notice/index', compact('notices'));
    }

    //增加
    public function create()
    {
        return view('admin/notice/create');
    }

    //储存方式
    public function store()
    {
        //验证
        $this->validate(request(), [
            'title' => 'required|string',
            'content'=>'required|string'
        ]);
        //逻辑
        $notice=\App\Notice::create(request(['title','content']));

        //启动队列
        dispatch(new \App\Jobs\SendMessage($notice));

        //渲染
        return redirect("admin/notices");
    }
}