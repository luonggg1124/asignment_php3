 <!-- News With Sidebar Start -->
 <div class="container-fluid py-3">
     <div class="container">
         <div class="row">
             <div class="col-lg-8">
                 <div class="row">
                     <div class="col-12">
                         <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                             <h3 class="m-0">{{ Str::ucfirst($title) }}</h3>
                             <a class="text-secondary font-weight-medium text-decoration-none" href="">Xem tất
                                 cả</a>
                         </div>
                     </div>
                     @foreach (\App\Models\News::latest()->take(4)->get() as $news)
                         <div class="col-lg-6">
                             <x-news-item class="mb-3" :$news />
                         </div>
                     @endforeach


                 </div>

                 <div class="mb-3">
                     <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                 </div>

                 <div class="row">
                    @foreach (\App\Models\News::latest()->skip(4)->take(10)->get() as $news)
                    <div class="col-lg-6">
                        <x-news-item-sm :$news/>
                    </div>
                    @endforeach
                    
                 </div>
                 @if ($paginate())
                    <x-paginate />
                 @endif
                 
             </div>

             @if (isset($sidebarRight) && $sidebarRight ===true)
                <x-sidebar-right :newsModel="new \App\Models\News()" />
             @endif
         </div>
     </div>
 </div>
 </div>
 <!-- News With Sidebar End -->
