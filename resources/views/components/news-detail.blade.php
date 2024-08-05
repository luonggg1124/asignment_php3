<!-- News Detail Start -->
<div class="position-relative mb-3">
    <img class="img-fluid w-100" src="{{ asset("$news->main_image") }}" style="object-fit: cover;">
    <div class="overlay position-relative bg-light">
        <div class="mb-3">
            <a href="">{{ Str::ucfirst($news->category->name) }}</a>
            <span class="px-1">/</span>
            <span>{{ \Carbon\Carbon::parse($news->created_at)->locale('vi')->translatedFormat('H:i,l, d F, Y') }}</span>
        </div>
        <div>
            <h3 class="mb-3">{{ $news->title }}</h3>
            <p>{!! nl2br(e($news->text)) !!}</p>
            @foreach ($news->contents as $content)
                <h4 class="mb-3">{!! nl2br(e($content->title)) !!}</h4>
                <img class="img-fluid w-50 float-{{ $content->image_side }} mr-4 mb-2"
                    src="{{ asset("$content->image") }}">
                <p>{!! nl2br(e($content->content)) !!} </p>
            @endforeach



        </div>
    </div>
</div>
<!-- News Detail End -->
