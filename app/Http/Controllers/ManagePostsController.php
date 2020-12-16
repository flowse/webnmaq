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
class ManagePostsController extends Controller
{
   public function index(){


    return view('managePosts');
    
   }
   public function createPost(Request $request){
    if($request->has(['content', 'title', 'image'])){
  
            if ($request->hasFile('image')) {
                if ($request->file('image')->isValid()) {
                    $post=new Blog();
        
                    $postID=DB::table('blogs')->orderBy('blogID', 'DESC')->pluck('blogID')->first();
                    $postID=$postID+1;
        
                    $validated = $request->validate(['image' => 'mimes:jpeg,png|max:3072',
                    ]);
                    
                    $extension = $request->image->extension();
                    $request->image->storeAs('/public', "blogImg".$postID.".".$extension);
                    $url = Storage::url("blogImg".$postID.".".$extension);
                    $post = Blog::create([
                       'content' => $request->content,
                       'title' => $request->title,
                       'image' => $url,
                    ]);
                    return back()->with('message', 'تم النشر بنجاح!');
                }
           }
        } else{
            return back()->with('message', 'جميع الحقول مطلوبة');

       }
       
    abort(500, 'لم يتم تحميل الصورة بنجاح، الرجاء المحاولة مرة اخرى :(');

}

}
