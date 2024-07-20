<div class="col-lg-4 pt-3 pt-lg-0">
    <x-social-follow/>

    <x-news-letter/>

    <!-- Ads Start -->
    <div class="mb-3 pb-3">
        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
    </div>
    <!-- Ads End -->
    <x-trending :newsModel="new \App\Models\News()"/>

    <x-tags />

</div>