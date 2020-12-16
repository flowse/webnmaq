@extends('blogPost')

@section('blog_content')

    @foreach($blogs as $blog)
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-head-s6">
                    <h3 class="heading-sm-s2">  {{ $blog->title }} </h3>
                </div>
                <div class="gaps size-1x d-none d-md-block"></div>
            </div>
           
        </div>
        <div class="row justify-content-center blog-content">
           <div class="col-md-12 text-center ">
            <img class="card-img-top mb-5 img-fluid" src='{{ $blog->image }}' >
            
            <div class="col-md-12 text-center"> 
            <div class="blog-views">
                <span> {{$blog->views}} </span> <i class="fa fa-eye"></i> 
                <span> {{$comments->count()}} </span> <i class="fa fa-comments"></i>
                  
                <span>{{\Carbon\Carbon::parse($blog->created_at)->format('d/m/y')}}</span> <i class="fa fa-calendar"></i> 
               
            </div>
            </div>
           </div>
        </div> <!-- end of image -->
        <div class="row">
            <div class="col-md-12">
            {!! $blog->content !!}
               
            </div>
        </div>

   
    @endforeach
        
@endsection

@section('content')

    @foreach($comments as $comment)
    <div class="row">
			<div class="col-md-12">
				<div class="comment  w-50">
				<div class="comment-header">
        <h5 class="d-inline ml-3 rtl"> {{ $comment->user }} </h5>
        <span class="rtl"> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
        </span> 
    </div>
    <p> {{$comment->content}}</p>
				</div>
               
			</div>
			
		</div>
    
    @endforeach
@endsection

@section('form')
    @auth
<form method="post" action="/createComment">
			<textarea class="comment-box w-75" name="content"></textarea>
            <input type="hidden" name="user" value='{{ Auth::user()->name }}'/>
            <input type="hidden" name="blogID" value='{{ $blogID }}'/>
            {{csrf_field()}}
			<div class="form-row">
				<button class="btn mr-5"> نشر</button>
			</div>
           <div class="mt-2 mr-5"> 
           @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif</div>
            </form>
            @else
		<p>الرجاء <a href="{{route('register')}}" >التسجيل</a> لكتابة تعليق</p>
		
    @endauth
@endsection

