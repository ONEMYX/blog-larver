<?php

namespace App;

use App\Model;

class Post extends Model
{
    // 关联用户
    public function user(){
        return $this->belongsTo('App\User');
    }
    // 评论模型
    public function comments()
    {
        return $this->hasMany('App\Comment')->orderBy('created_at','desc');
    }
}