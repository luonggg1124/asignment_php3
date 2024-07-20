<div class="col-lg-6 py-3">
    <x-title-h3 title="{{Str::ucfirst($category->name)}}" :link="false"/>
    
    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
        @foreach (\App\Models\News::where('category_id',$category->id)->lastDaysPopularNews(3)->limit(5)->get() as $news)
            <x-news-item :$news />
        @endforeach
        
        
        
    </div>
</div>