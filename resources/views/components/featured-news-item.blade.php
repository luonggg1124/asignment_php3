<div class="position-relative overflow-hidden" style="height: 300px;">
    <img class="img-fluid w-100 h-100" src="{{ asset("img/$news->main_image") }}" style="object-fit: cover;">
    <div class="overlay">
        <div class="mb-1" style="font-size: 13px;">
            <a class="text-white" href=""> {{ Str::ucfirst($news->category->name) }}</a>
            <span class="px-1 text-white">/</span>
            <a class="text-white" href=""><x-format-time :time="$news->created_at"/></a>
        </div>
        <a class="h4 m-0 text-white" href="{{ route('pages.single',$news) }}">{{ strlen($news->title) > 20 ? mb_substr( $news->title, 0, 20).'...': $news->title }}</a>
        
    </div>
</div>