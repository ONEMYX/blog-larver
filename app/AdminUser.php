<?php

namespace App;

use App\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUser extends Authenticatable
{
    //
    protected $rememberTokenName = '';
    protected $guarded=[];//不可以注入的字段
}
