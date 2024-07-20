<x-layout>
      <x-header/>
    
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="container">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="/">Trang chủ</a>
                    <a class="breadcrumb-item" href="{{ route('pages.category') }}">Danh mục</a>
                    <span class="breadcrumb-item active">{{ Str::ucfirst($category->name) }}</span>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb End -->
    
    
        <!-- News With Sidebar Start -->
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                    <h3 class="m-0">{{ Str::ucfirst($category->name) }}</h3>
                                    
                                </div>
                            </div>
                            @foreach ($mainNews as $news)
                            
                                <div class="col-lg-6">
                                    <x-news-item class="mb-3" :$news />
                                </div>
                            @endforeach
                            
                        </div>
                        
                        <div class="mb-3">
                            <a href=""><img class="img-fluid w-100" src="img/ads-700x70.jpg" alt=""></a>
                        </div>
                        
                        <div class="row">
                            @foreach ($followedNews as $news)
                            <div class="col-lg-6">
                                <x-news-item-sm :$news />
                            </div>
                            @endforeach
                            
                            
                            
                        </div>
                        
                    </div>
    
                    <x-sidebar-right/>
                </div>
            </div>
        </div>
        </div>
        <!-- News With Sidebar End -->
    
    
      <x-footer/>
</x-layout>