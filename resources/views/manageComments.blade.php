<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('التعليقات') }}
        </h2>
    </x-slot>

   <!--  <x-jet-welcome /> -->
   <div class="card shadow-sm">
                    <div class="row g-0 border-right border-bottom p-3 h-100">
                        <div class="col-12 pr-0">
                            <div class="card-body ">
                                <div class="">
                                   <!-- "d-flex flex-row bd-highlight mb-3 -->
                                    <div class="container">
                                    @if($comments->isEmpty())
                                    <div class=" mt-2 text-center">
                                           لا يوجد اي تعليق
                                        </div>
                                    @endif

                                    @foreach($comments as $comment)
                                    
                                    <div class="row ">
                                            <div class="col-12 col-md-6  mx-auto ">
                                                <div class="comment ">
                                                <div class="comment-header">
                                        <h5 class="d-inline ml-3 rtl"> {{ $comment->user }} </h5>
                                        <span class="rtl"> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                                        </span> 
                                       
                                    </div>
                                    <p> {{$comment->content}}</p>
                                    <div class="row"> 
                                        <div class="col-3 ml-auto">
                                        <form method="post" action="/dashboard/manageComments/approveComments" class="d-inline"> 
                                        {{csrf_field()}}
                                        <input type="hidden" name="commentID" value='{{ $comment->commentID }}'/>
                                        <button class=" bt-icon" type="submit"> <i class="fa fa-check"></i></button>
                                        </form>
                                        
                                        <form method="post" action="/dashboard/manageComments/deleteComments"  class="d-inline"> 
                                        {{csrf_field()}}
                                        <input type="hidden" name="commentID" value='{{ $comment->commentID }}'/>
                                        <button class=" bt-icon "  type="submit"> <i class="fa fa-trash"></i></button>
                                        </form>
                                        </div>

                                        </div>
                                                </div>
                                            
                                            </div>
                                            
                                        </div>
                                   
                                        
                                   
                                    
                                    @endforeach

                                    @if(session()->has('message'))
                                        <div class="alert alert-success mt-2 mx-auto text-center">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
        
</x-app-layout>