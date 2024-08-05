<div class="d-flex">
    <img src="{{ asset("$news->main_image") }}" style="width: 80px; height: 80px; object-fit: cover;">
    <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
        <a class="text-secondary font-weight-semi-bold" href="{{ route('pages.single',$news) }}">{{ strlen($news->title) > 60 ? mb_substr( $news->title, 0, 60).'...': $news->title }}</a>
    </div>
</div>
