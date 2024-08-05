<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center bg-light px-lg-5">
        <div class="col-12 col-md-8">
            <div class="d-flex justify-content-between">
                <div class="bg-primary text-white text-center py-2" style="width: 100px;">Tranding</div>
                <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                    style="width: calc(100% - 100px); padding-left: 90px;">
                    <div class="text-truncate"><a class="text-secondary"
                            href="https://www.facebook.com/luongnguyen.1124">Nguyễn Minh Lương</a></div>
                    <div class="text-truncate"><a class="text-secondary" href="">Louis Nguyen</a></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right d-none d-md-block">
            {{ \Carbon\Carbon::parse(now('Asia/Ho_Chi_Minh'))->locale('vi')->translatedFormat('H:i,l, d F, Y') }}
        </div>
    </div>
    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span></h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right d-flex justify-content-end">
            @auth
               
                <div class="d-flex">
                    @if (auth()->user()->is_admin == 1)
                    <div class="mx-2"><a href="{{route('admin.index')}}">Admin</a></div>
                    @endif
                    
                    <div class="mx-2"><a href="">Hello,{{ auth()->user()->name }}</a></div>
                    <div class="mx-2"><form action="{{ route('auth.logout') }}" method="POST">@csrf <button style=" border-radius:3px;border: none;background: rgb(160, 158, 158)" type="submit">Logout</button></form></div>
                </div>
            @else
                <a href="{{ route('login') }}">Login & Register</a>
            @endauth

        </div>
    </div>
</div>
<!-- Topbar End -->


<!-- Navbar Start -->
<div class="container-fluid p-0 mb-3">
    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('pages.index') }}" class="nav-item nav-link ">Home</a>
                <a href="{{ route('pages.category') }}" class="nav-item nav-link">Categories</a>

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="#" class="dropdown-item">Menu item 1</a>
                        <a href="#" class="dropdown-item">Menu item 2</a>
                        <a href="#" class="dropdown-item">Menu item 3</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <form method="GET" action="{{ route('search') }}" class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control" placeholder="Keyword" name="keyword">
                <div class="input-group-append">
                    <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </nav>
</div>
<!-- Navbar End -->
{{ $slot }}
