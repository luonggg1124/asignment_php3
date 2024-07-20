<x-layout>
    <x-header>
        <x-top-news-slider :topNewsItems="$topNews" />
    </x-header>
    <x-main-news-slider :categories="$categories" />

    <x-featured-news-slider :$featuredNews />

    @foreach ($categories->chunk(2) as $categoriesItems)
        <x-category-news-slider :categories="$categoriesItems" />
    @endforeach


    <x-news-with-sidebar  title="Mới nhất" :sidebarRight="true"/>

    <x-footer />
</x-layout>
