<div class="position-relative overflow-hidden mb-3 " style="height: 80px;">
    <img class="img-fluid w-100 h-100 " src="{{asset($category->image)}}" style="object-fit: cover;">
    <a href="{{ route('category.show',$category) }}"
        class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
        {{ Str::ucfirst($category->name) }}
    </a>
</div>
