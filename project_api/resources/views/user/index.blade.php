@extends("layouts.user")

@section('header')
<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
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

    <nav class="navbar navbar-expand-lg navbar-light py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
        <a href="index.html" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="fw-bold text-primary m-0">F<span class="text-secondary">oo</span>dy</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About Us</a>
                <a href="product.html" class="nav-item nav-link">Products</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu m-0">
                        <a href="blog.html" class="dropdown-item">Blog Grid</a>
                        <a href="feature.html" class="dropdown-item">Our Features</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact Us</a>
            </div>
            <div class="d-none d-lg-flex ms-2">
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-search text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-user text-body"></small>
                </a>
                <a class="btn-sm-square bg-white rounded-circle ms-3" href="">
                    <small class="fa fa-shopping-bag text-body"></small>
                </a>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->


<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{asset('user')}}/img/carousel-1.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">Organic Food Is Good For Health</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="{{asset('user')}}/img/carousel-2.jpg" alt="Image">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-lg-7">
                                <h1 class="display-2 mb-5 animated slideInDown">Natural Food Is Always Healthy</h1>
                                <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                <a href="" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->
@endsection

@section("about-us")
<div class="container">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="about-img position-relative overflow-hidden p-5 pe-0">
                <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/about.jpg">
            </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <h1 class="display-5 mb-4">About Us</h1>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
            <p><i class="fa fa-check text-primary me-3"></i>Tempor erat elitr rebum at clita</p>
            <p><i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam et eos</p>
            <p><i class="fa fa-check text-primary me-3"></i>Clita duo justo magna dolore erat amet</p>
            <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="">Read More</a>
        </div>
    </div>
</div>
@endsection

@section("deal")
<div class="container">
    <div class="row g-0 gx-5 align-items-end">
        <div class="col-lg-6">
            <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Products</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
        </div>
        <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Best Seller</a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Hot Deals</a>
                </li>
                <li class="nav-item me-0">
                    <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">New Arrivals</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
        <div id="tab-2" class="tab-pane fade show p-0">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
        <div id="tab-3" class="tab-pane fade show p-0">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section("categories")
<div class="container">
    <div class="row g-0 gx-5 align-items-end">
        <div class="col-lg-6">
            <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Products</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
        </div>
        <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
            <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-1">Vegetable</a>
                </li>
                <li class="nav-item me-2">
                    <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>
                </li>
                <li class="nav-item me-0">
                    <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
        <div id="tab-2" class="tab-pane fade show p-0">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
        <div id="tab-3" class="tab-pane fade show p-0">
            <div class="row g-4">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-1.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-2.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-3.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-4.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-5.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-6.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-7.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-item">
                        <div class="position-relative bg-light overflow-hidden">
                            <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('user')}}/img/product-8.jpg" alt="">
                            <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                        </div>
                        <div class="text-center p-4">
                            <a class="d-block h5 mb-2" href="">Fresh Tomato</a>
                            <span class="text-primary me-1">$19.00</span>
                            <span class="text-body text-decoration-line-through">$29.00</span>
                        </div>
                        <div class="d-flex border-top">
                            <small class="w-50 text-center border-end py-2">
                                <a class="text-body" href=""><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                            </small>
                            <small class="w-50 text-center py-2">
                                <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('review')

<div class="container">
    <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-3">Customer Review</h1>
        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
    </div>
    <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
        <div class="testimonial-item position-relative bg-white p-5 mt-4">
            <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            <div class="d-flex align-items-center">
                <img class="flex-shrink-0 rounded-circle" src="{{asset('user')}}/img/testimonial-1.jpg" alt="">
                <div class="ms-3">
                    <h5 class="mb-1">Client Name</h5>
                    <span>Profession</span>
                </div>
            </div>
        </div>
        <div class="testimonial-item position-relative bg-white p-5 mt-4">
            <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            <div class="d-flex align-items-center">
                <img class="flex-shrink-0 rounded-circle" src="{{asset('user')}}/img/testimonial-2.jpg" alt="">
                <div class="ms-3">
                    <h5 class="mb-1">Client Name</h5>
                    <span>Profession</span>
                </div>
            </div>
        </div>
        <div class="testimonial-item position-relative bg-white p-5 mt-4">
            <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            <div class="d-flex align-items-center">
                <img class="flex-shrink-0 rounded-circle" src="{{asset('user')}}/img/testimonial-3.jpg" alt="">
                <div class="ms-3">
                    <h5 class="mb-1">Client Name</h5>
                    <span>Profession</span>
                </div>
            </div>
        </div>
        <div class="testimonial-item position-relative bg-white p-5 mt-4">
            <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
            <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
            <div class="d-flex align-items-center">
                <img class="flex-shrink-0 rounded-circle" src="{{asset('user')}}/img/testimonial-4.jpg" alt="">
                <div class="ms-3">
                    <h5 class="mb-1">Client Name</h5>
                    <span>Profession</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('contact-us')
<!-- Contact Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-5 mb-3">Contact Us</h1>
            <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-primary text-white d-flex flex-column justify-content-center h-100 p-5">
                    <h5 class="text-white">Call Us</h5>
                    <p class="mb-5"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <h5 class="text-white">Email Us</h5>
                    <p class="mb-5"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <h5 class="text-white">Office Address</h5>
                    <p class="mb-5"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <h5 class="text-white">Follow Us</h5>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                                <label for="name">Your Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Subject</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 200px"></textarea>
                                <label for="message">Message</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary rounded-pill py-3 px-5" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Google Map Start -->
<div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
    <iframe class="w-100" style="height: 450px;"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
        frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<!-- Google Map End -->

@endsection


@section('footer')
<div class="container py-5">
    <div class="row g-5">
        <div class="col-lg-3 col-md-6">
            <h1 class="fw-bold text-primary mb-4">F<span class="text-secondary">oo</span>dy</h1>
            <p>Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita</p>
            <div class="d-flex pt-2">
                <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-twitter"></i></a>
                <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-square btn-outline-light rounded-circle me-1" href=""><i class="fab fa-youtube"></i></a>
                <a class="btn btn-square btn-outline-light rounded-circle me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Address</h4>
            <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
            <p><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
            <p><i class="fa fa-envelope me-3"></i>info@example.com</p>
        </div>
        <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Quick Links</h4>
            <a class="btn btn-link" href="">About Us</a>
            <a class="btn btn-link" href="">Contact Us</a>
            <a class="btn btn-link" href="">Our Services</a>
            <a class="btn btn-link" href="">Terms & Condition</a>
            <a class="btn btn-link" href="">Support</a>
        </div>
        <div class="col-lg-3 col-md-6">
            <h4 class="text-light mb-4">Newsletter</h4>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px;">
                <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>


@endsection