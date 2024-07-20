<!-- Category News Slider Start -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            @foreach ($categories as $category)
                <x-category-news :$category />
            @endforeach
            
        </div>
    </div>
</div>
</div>
<!-- Category News Slider End -->