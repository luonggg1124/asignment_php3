<div {{ $attributes->class('d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3') }}>
    <h3 class="m-0">{{ $title }}</h3>
    @if (isset($link) && $link == true)
        <a class="text-secondary font-weight-medium text-decoration-none" href="{{ $link }}">Xem
            Tất Cả
        </a>
    @endif

</div>
