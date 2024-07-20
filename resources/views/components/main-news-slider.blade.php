 <!-- Main News Slider Start -->
 <div class="container-fluid py-3">
     <div class="container">
         <div class="row">
             <x-main-slider class="col-lg-8" />
             <div class="col-lg-4">
                 <x-title-h3 title="Danh mục" :link="false" />
                 @forelse ($categories as $category)
                     <x-category-item :$category />
                 @empty
                 @endforelse
             </div>
         </div>
     </div>
 </div>
 <!-- Main News Slider End -->
