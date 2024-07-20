<!-- Tags Start -->
    <div {{ $attributes->class('pb-3') }} >
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Thẻ</h3>
        </div>
        <div class="d-flex flex-wrap m-n1">
            @foreach (\App\Models\Tag::withCount('views')->orderByDesc('views_count')->take(16)->get() as $tag)
                <a href="" class="btn btn-sm btn-outline-secondary m-1">{{ Str::ucfirst($tag->name) }}</a>
            @endforeach
        </div>
    </div>
    <!-- Tags End -->