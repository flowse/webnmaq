<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{

    public function index(){
        $blogs = DB::table('blogs')->get();
        $blogs= $blogs->reverse();
        return view('blogCards', [
            'blogs'=> $blogs
        ]);
    }
}
