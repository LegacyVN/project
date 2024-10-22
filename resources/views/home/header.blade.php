<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->
<!-- Session Message Start -->
@if (session('msg'))
<div class="alert alert-info alert-dismissible fade show custom-alert">
    {{ session('msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show custom-alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<!-- Session Message End -->

<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn bg-white" data-wow-delay="0.1s">
    <div class="top-bar row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>123 Street, New York, USA</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>info@example.com</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>Follow us:</small>
            <a class="text-body ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-body ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn shadow" data-wow-delay="0.1s">
        <a href="{{url('/home')}}">
        <div class="navbar-brand ms-4 ms-lg-0 d-flex justify-content-center align-items-center">            
            <div class="brand-logo"></div>
            <div class="text-center"><span class="fw-bold mb-4" style="color:brown; font-size:2rem">FLAVOURS</span></div>
        </div>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href={{url("/home")}} class="nav-item nav-link active">Home</a>
                <a href={{url("home#nav-about-us")}} class="nav-item nav-link">About Us</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
                    <div class="dropdown-menu m-0">
                        <a href={{url("home#nav-featured")}} class="dropdown-item">Featured</a>
                        <a href={{url("home/browse-products")}} class="dropdown-item">Browse Products</a>
                    </div>
                </div>
                <a href={{url("home#gallery")}} class="nav-item nav-link">Gallery</a>
                <a href={{url("home#nav-contacts")}} class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="d-none d-lg-flex align-items-center ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a>

                <style>
                    .d-flex {
                        display: flex;
                        align-items: center;
                        /* Center elements vertically */
                    }

                    .nav-link {
                        margin: 0;
                        /* Ensure there's no margin affecting layout */
                    }
                </style>

                <!-- Authentication Links -->
                @if (Route::has('login'))
                @auth
                <div class="d-flex align-items-center me-">
                    <a href="{{ Auth::user()->usertype == 'admin' ? route('profile.edit') : url('/profile/user-order/'.Auth::user()->id)}}" class="nav-link me-2">
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                        @csrf
                        <a href="#" class="nav-link"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa fa-sign-out"></i> Logout
                        </a>
                    </form>
                </div>
                @else
                <li class="d-flex align-items-center me-3">
                    <a href="{{ route('login') }}" class="nav-link"><i class="fa fa-user"></i> Login</a>
                </li>
                @if (Route::has('register'))
                <li class="d-flex align-items-center me-3">
                    <a href="{{ route('register') }}" class="nav-link"><i class="fa fa-vcard"></i> Register</a>
                </li>
                @endif
                @endauth
                @endif

                <a class="btn-sm-square bg-white rounded-circle ms-3" href="{{url("/home/cart")}}">
                    <small class="fa fa-shopping-bag text-body"></small>
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->