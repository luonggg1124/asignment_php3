 <!-- Featured News Slider Start -->
 <div class="container-fluid py-3">
    <div class="container">
        <x-title-h3 title="Đặc sắc" :link="true" />
        <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
            @foreach ($featuredNews as $news)
                <x-featured-news-item :$news/>
            @endforeach
            
        </div>
    </div>
</div>
</div>
<!-- Featured News Slider End -->