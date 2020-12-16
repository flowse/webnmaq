<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\File;

class ManageCommentsController extends Controller
{
   public function index(){

    $comments = Comment::where('published', 0)->get();
    $comments= $comments->reverse();

    $carbon=Carbon::setLocale('ar');

    return view('manageComments', [
        'comments'=> $comments,
        $carbon
    ] );
    
   }
   public function deleteComments(Request $request){

        $id=$request->commentID;
        $comments = Comment::where('commentID', $id)->delete();

        
        return back()->with('message', 'تم الحذف بنجاح!');
}
    public function approveComments(Request $request){

        $id=$request->commentID;
        $comments = Comment::where('commentID', $id)->update(['published'=>1]);


        return back()->with('message', 'تم النشر بنجاح!');
    }

}
