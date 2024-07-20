<x-layout>
       <x-header/>
       
    
        <!-- Breadcrumb Start -->
        <div class="container-fluid">
            <div class="container">
                <nav class="breadcrumb bg-transparent m-0 p-0">
                    <a class="breadcrumb-item" href="#">Home</a>
                    <a class="breadcrumb-item" href="#">Category</a>
                    <a class="breadcrumb-item" href="#">{{ Str::ucfirst($news->category->name) }}</a>
                    <span class="breadcrumb-item active">{{ strlen($news->title) > 40 ? mb_substr( $news->title, 0, 40).'...': $news->title }}</span>
                </nav>
            </div>
        </div>
        <!-- Breadcrumb End -->
    
    
        <!-- News With Sidebar Start -->
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <x-news-detail :$news />
    
                       <x-comment-list/>
    
                        <!-- Comment Form Start -->
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">Leave a comment</h3>
                            <form>
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="url" class="form-control" id="website">
                                </div>
    
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <input type="submit" value="Leave a comment"
                                        class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                </div>
                            </form>
                        </div>
                        <!-- Comment Form End -->
                    </div>
    
                    <x-sidebar-right />
                </div>
            </div>
        </div>
        </div>
        <!-- News With Sidebar End -->
    
    
        <x-footer/>
</x-layout>