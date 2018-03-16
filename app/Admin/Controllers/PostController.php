<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/7
 * Time: 16:19
 */

namespace App\Admin\Controllers;

use \App\Post;

class PostController extends Controller
{
    //首页
    public function index()
    {
        $posts=Post::withoutGlobalScope('avaiale')->where('status',0)->orderBy('created_at','desc')->paginate(10);

        return view('/admin/posts/index',compact('posts'));
    }

    //审核
    public function status(Post $post)
    {
        // 验证
        $this->validate(request(),[
            'status'=>'required|in:1,-1'
        ]);
        //保存
        $post->status = request('status');
        $post->save();
        //返回
        return [
            'error' => 0,
            'msg' => ''
        ];

    }

}