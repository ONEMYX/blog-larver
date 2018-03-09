<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2017/12/20
 * Time: 20:15
 */
namespace App;

use Illuminate\Database\Eloquent\Model as BoseModel;

class Model extends BoseModel
{
    //
    protected $guarded=[];//不可以注入的字段
    //protected $fillable=['title','content'];//可以注入的字段
}