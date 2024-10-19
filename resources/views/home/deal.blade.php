<div class="container-xxl py-5" id="nav-featured">
    <!-- Display error message -->
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Featured Products</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-1">Best Seller</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Hot Deals</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary border-2 active" data-bs-toggle="pill" href="#tab-3">New Arrivals</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0">
                <div class="row g-4">
                    @if (isset($best_products))
                    @for ($i=0,$sec=0.1; $i<$best_products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="{{asset("products")}}/{{$best_products[$i]->image}}" alt="">
                                    <div class="bg-secondary prod-new rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3" data-exists={{$new_products->contains($best_products[$i]) ? "exists" : ""}}>New</div>
                                    <div class="bg-danger prod-sale rounded text-white position-absolute end-0 top-0 py-1 px-2" data-discount="{{$best_products[$i]->discount_price}}">{{"-" . $best_products[$i]->discount_price*100 . "%"}}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{url("/home/product-details/".$best_products[$i]->id."/".$best_products[$i]->category_id)}}>{{$best_products[$i]->title}}</a>
                                    @if ($best_products[$i]->discount_price == 0.00)
                                    <span class="text-primary me-1">{{"$".$best_products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$best_products[$i]->price - ($best_products[$i]->price * $best_products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$best_products[$i]->price}}</span>
                                    @endif
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{url("/home/product-details/".$best_products[$i]->id."/".$best_products[$i]->category_id)}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        @if ($products[$i]->quantity == 0)
                                        <a class="text-body add-to-cart"><span class="text-danger">Out of stock</span></a>
                                        @else
                                        <a class="text-body add-to-cart" href={{"/home/save/".$best_products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        @endif

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                        @endif
                        <div class="col-12 text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                </div>
            </div>
            <div id="tab-2" class="tab-pane fade show p-0">
                <div class="row g-4">
                    @if (isset($dis_products))
                    @for ($i=0,$sec=0.1; $i<$dis_products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="{{asset('user')}}/img-fluid w-100" src="{{asset("products")}}/{{$dis_products[$i]->image}}" alt="">
                                    <div class="bg-secondary prod-new rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3" data-exists={{$new_products->contains($dis_products[$i]) ? "exists" : ""}}>New</div>
                                    <div class="bg-danger prod-sale rounded text-white position-absolute end-0 top-0 py-1 px-2" data-discount="{{$dis_products[$i]->discount_price}}">{{"-" . $dis_products[$i]->discount_price*100 . "%"}}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{url("/home/product-details/".$dis_products[$i]->id."/".$dis_products[$i]->category_id)}}>{{$dis_products[$i]->title}}</a>
                                    @if ($dis_products[$i]->discount_price == 0.00)
                                    <span class="text-primary me-1">{{"$".$dis_products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$dis_products[$i]->price - ($dis_products[$i]->price * $dis_products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$dis_products[$i]->price}}</span>
                                    @endif
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{url("/home/product-details/".$dis_products[$i]->id."/".$dis_products[$i]->category_id)}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        @if ($products[$i]->quantity == 0)
                                        <a class="text-body add-to-cart"><span class="text-danger">Out of stock</span></a>
                                        @else
                                        <a class="text-body add-to-cart" href={{"/home/save/".$dis_products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                        @endif
                        <div class="col-12 text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @if (isset($new_products))
                    @for ($i=0,$sec=0.1; $i<$new_products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="{{asset('user')}}/img-fluid w-100" src="{{asset("products")}}/{{$new_products[$i]->image}}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3">New</div>
                                    <div class="bg-danger prod-sale rounded text-white position-absolute end-0 top-0 py-1 px-2" data-discount="{{$new_products[$i]->discount_price}}">{{"-" . $new_products[$i]->discount_price*100 . "%"}}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{url("/home/product-details/".$new_products[$i]->id."/".$new_products[$i]->category_id)}}>{{$new_products[$i]->title}}</a>
                                    @if ($new_products[$i]->discount_price == 0.00)
                                    <span class="text-primary me-1">{{"$".$new_products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$new_products[$i]->price - ($new_products[$i]->price * $new_products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$new_products[$i]->price}}</span>
                                    @endif
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{url("/home/product-details/".$new_products[$i]->id."/".$new_products[$i]->category_id)}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        @if ($products[$i]->quantity == 0)
                                        <a class="text-body add-to-cart"><span class="text-danger">Out of stock</span></a>
                                        @else
                                        <a class="text-body add-to-cart" href={{"/home/save/".$new_products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                        @endif
                        <div class="col-12 text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href={{url("/home/browse-products")}}>Browse More Products</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>