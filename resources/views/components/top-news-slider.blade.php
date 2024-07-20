 <!-- Top News Slider Start -->
 <div class="container-fluid py-3">
     <div class="container">
         <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
             @foreach ($topNewsItems as $news)
                 <x-top-news-item :$news/>
             @endforeach



         </div>
     </div>
 </div>
 <!-- Top News Slider End -->
