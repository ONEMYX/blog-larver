<?php
/**
 * Created by PhpStorm.
 * User: 孟亚鑫
 * Date: 2018/3/7
 * Time: 20:08
 */



namespace App\Admin\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }
}