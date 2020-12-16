@extends('blog')

@section('blog_cards')
    @foreach($blogs as $blog)

    <div class="col-md-6">
        <div class="token-alocate-item animated blog-card media-box" data-animate="fadeInUp" data-delay=".5">
            <div class="card-img-block ">
            
                <img class="card-img-top" src=  "{{url($blog->image) }}" >
              
              <!-- $blog->image -->
               
               
            </div>
                <div class="text-block token-alocate-list">
                    <div class="row">
                    <div class="col-8 col-md-9">
                        <h4 class="about animated" data-animate="fadeInUp" data-delay=".3"> {{ $blog->title }}</h4>   
                        </div> 
                        <div class="col-4 col-md-3">
                                <div class="blog-views">
                                <span> {{$blog->views}} </span> <i class="fa fa-eye ml-3"></i> 
                                </div>
                                </div> 
                    </div>
                    </div>
                    <div class="btn-container">
                        <a class="btn" href="/blogPost{{ $blog->blogID }}" > اقرأ المزيد</a> 
                    </div>  

                </div>  
               
        </div>

    @endforeach

@endsection
