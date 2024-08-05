<div {{ $attributes }}>
    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
        @foreach (\App\Models\News::lastDaysPopularNews(\Carbon\Carbon::now()->subDays(2))->take(3)->get() as $news)
        <div class="position-relative overflow-hidden" style="height: 435px;">
            <img class="img-fluid h-100" src="{{ asset("$news->main_image") }}" style="object-fit: cover;">
            <div class="overlay">
                <div class="mb-1">
                    <a class="text-white" href="">{{ Str::ucfirst($news->category->name) }}</a>
                    <span class="px-2 text-white">/</span>
                    <a class="text-white" href=""><x-format-time :time="$news->created_at" /></a>
                </div>
                <a class="h2 m-0 text-white font-weight-bold" href="{{ route('pages.single',$news) }}">{{ strlen($news->title) > 80 ? mb_substr( $news->title, 0, 80).'...': $news->title }}</a>
            </div>
        </div>
        @endforeach


    </div>
</div>
