<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('نشر تدوينة جديدة') }}
        </h2>
    </x-slot>

   <!--  <x-jet-welcome /> -->
   <div class="card shadow-sm">
                    <div class="row g-0 border-right border-bottom p-3 h-100">
                        <div class="col-md-6 pr-0 mx-auto">
                            <div class="card-body ">
                                <div class="d-flex flex-row bd-highlight mb-3  justify-content-center">
                                   
                                    <div class="container">
                                        <form method="post" action="/dashboard/managePosts/createPost" enctype="multipart/form-data">

                                        <div class="form-group">
                                        <input type="text" name="title" placeholder="العنوان" class="form-control"/>
                                        </div>

                                        <div class="form-group">
                                        <textarea class="form-control" name="content" placeholder="المحتوى"></textarea>
                                        </div>

                                        <div class="form-group">
                                        <input type="file" name="image" placeholder="الصورة" class="form-control"/>
                                        </div>

                                        {{csrf_field()}}
                                        <div class="form-row">
                                            <button class="btn my-2"> نشر</button>
                                        </div>
                                        </form>
                                        @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                        @endif
                                        
                                      
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
        
</x-app-layout>