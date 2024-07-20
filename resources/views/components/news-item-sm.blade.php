<div {{ $attributes->class('d-flex mb-3') }}>
    <img src="{{ asset("img/$news->main_image") }}" style="width: 100px; height: 100px; object-fit: cover;">
    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3"
        style="height: 100px;">
        <div class="mb-1" style="font-size: 13px;">
            <a href="">{{ Str::ucfirst($news->category->name) }}</a>
            <span class="px-1">/</span>
            <span><x-format-time :time="$news->created_at"/></span>
        </div>
        <a class="h6 m-0" href="{{route('pages.single',$news)}}">{{ strlen($news->title) > 30 ? mb_substr( $news->title, 0, 30).'...': $news->title }}</a>
    </div>
</div>