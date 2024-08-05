<div {{ $attributes->class('position-relative') }}>
    <img class="img-fluid w-100 " src="{{ asset("$news->main_image") }}" style="object-fit: cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-2" style="font-size: 14px;">
            <a href="">{{ Str::ucfirst($news->category->name) }}</a>
            <span class="px-1">/</span>
            <span><x-format-time :time="$news->created_at"/></span>
        </div>
        <a class="h4 m-0 " style="font-size: 20px;" href="{{ route('pages.single',$news) }}">{{ strlen($news->title) > 30 ? mb_substr( $news->title, 0, 30).'...': $news->title }}</a>
    </div>
</div>
