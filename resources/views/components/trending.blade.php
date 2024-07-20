<!-- Popular News Start -->
<div class="pb-3">
    <x-title-h3 title="Xu hướng" :link="false" />
    @foreach ($newsModel->lastDaysPopularNews(\Carbon\Carbon::now()->subDays(15))->take(4)->get() as $news)
        <x-news-item-sm :$news/>
    @endforeach
   
</div>
<!-- Popular News End -->