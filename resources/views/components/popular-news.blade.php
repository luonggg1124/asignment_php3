<div class="d-flex mb-3">
    <img src="img/news-100x100-1.jpg" style="width: 100px; height: 100px; object-fit: cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">{{Str::ucfirst($news>category)}}</a>
            <span class="px-1">/</span>
            <span>{{ $news->created_at->format('l, F j, Y') }}</span>
        </div>
        <a class="h6 m-0" href="">{{ $news->title }}</a>
    </div>
</div>