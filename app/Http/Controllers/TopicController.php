<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class TopicController extends Controller
{
    //专题详情页
    public function show(Topic $topic)
    {
        //带文章数的专题
        $topic = Topic::withCount('postTopics')->find($topic->id);

        //专题文章列表，安装时间倒叙排列
        $posts = $topic->posts()->orderBy('created_at','desc')->get();

        //属于自己的文章但为投稿
        $myposts = \App\Post::authorBy(\Auth::id())->topicNotBy($topic->id)->get();

        return view('topic/show',compact('topic','posts','myposts'));
    }
    //
    public function submit(Topic $topic)
    {
        //验证
        $this->validate(\request(),[
            'post_ids'=>'required|array',
        ]);

        //逻辑
        $post_ids =\request('post_ids');
        $topic_id=$topic->id;
        foreach ($post_ids as $post_id)
        {
            \App\PostTopic::firstOrCreate(compact('topic_id','post_id'));
        }
        //渲染
        return back();
    }
}
