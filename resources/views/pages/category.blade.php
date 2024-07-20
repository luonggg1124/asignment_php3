<x-layout>
    <x-header/>
  
      <!-- Breadcrumb Start -->
      <div class="container-fluid">
          <div class="container">
              <nav class="breadcrumb bg-transparent m-0 p-0">
                  <a class="breadcrumb-item" href="{{ route('pages.index') }}">Home</a>
                  <a class="breadcrumb-item" href="#">Category</a>
                  
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
                                  <h3 class="m-0">Tất cả danh mục</h3>
                                  
                              </div>
                          </div>
                          @foreach (\App\Models\Category::all() as $category)
                          <div class="col-lg-6">
                              <x-category-item :$category />
                          </div>
                          @endforeach
                          
                         
                      </div>
                      
                     
                  </div>
  
                  <x-news-with-sidebar title="Tin mới nhất" :sidebarRight="true"/>
              </div>
          </div>
      </div>
      </div>
      <!-- News With Sidebar End -->
  
  
    <x-footer/>
</x-layout>