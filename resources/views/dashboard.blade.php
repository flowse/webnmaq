<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('لوحة التحكم') }}
        </h2>
    </x-slot>

   <!--  <x-jet-welcome /> -->
   <div class="card shadow-sm">
                    <div class="row g-0">
                        <div class="col-md-6 pr-0 ">
                            <div class="card-body border-right border-bottom p-3 h-100">
                                <div class="d-flex flex-row bd-highlight mb-3">
                                   
                                    <div class="pr-3">
                                        <div class="">
                                            <h3 class="h5 font-weight-bolder text-dark">مرحبا,  {{ Auth::user()->name }} !</h3>
                                        </div>
                                        <p class="text-muted">
                                          تستطيع التحكم بالمدونة من هنا
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
        
</x-app-layout>