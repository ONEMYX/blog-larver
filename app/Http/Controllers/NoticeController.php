<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;

class NoticeController extends Controller
{
    public function index()
    {
        $user =\Auth::user();

        $notices =$user->notice;

        return view('/notice/index',compact('notices'));
    }
}
