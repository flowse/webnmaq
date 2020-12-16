<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Comment;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class BlogPostController extends Controller
{
   public function index($id){

   $blog= Blog::where('blogID', $id)->get();
   $comments = Comment::where('blogID', $id)->where('published', 1)->get();
   $comments= $comments->reverse();

   Blog::where('blogID', $id)->increment('views');
   
   $carbon=Carbon::setLocale('ar');

    return view('blogPostContent', [
        'comments'=> $comments, 
        'blogs'=> $blog, 
        'blogID' => $id,
        $carbon
    ]);

   }

   public function createComment(Request $request){
       if($request->filled('content')){
        $comment=new Comment();
        $comment->content=$request->content;
        $comment->user=$request->user;
        $comment->blogID=$request->blogID;
        $comment->save();
        return back()->with('message', 'تم حفظ تعليقك بنجاح! سيتم نشره بعد موافقة مدير الموقع');
       } else{
        return back()->with('message', 'الرجاء كتابة التعليق');

       }
        
   }
}
