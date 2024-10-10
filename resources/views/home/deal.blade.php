<div class="container-xxl py-5">
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
            <div id="tab-1" class="tab-pane fade show p-0 active"></div>
            <div id="tab-2" class="tab-pane fade show p-0">
                <div class="row g-4">
                    @for ($i=0,$sec=0.1; $i<$dis_products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('products')}}/{{$dis_products[$i]->image}}" alt="">
                                    <div class="position-absolute top-0 start-0 m-3 tag-container">
                                        <div class="bg-secondary rounded text-white py-1 px-3">New</div>
                                        <div class="bg-danger prod-sale rounded text-white py-1 px-3" data-discount="{{$dis_products[$i]->discount_price}}">Sale</div>
                                    </div>

                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{"/home/product-details/".$dis_products[$i]->id."/".$dis_products[$i]->category_id}}>{{$dis_products[$i]->title}}</a>
                                    @if ($dis_products[$i]->discount_price == 1.00)
                                    <span class="text-primary me-1">{{"$".$dis_products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$dis_products[$i]->price - ($dis_products[$i]->price * $dis_products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$dis_products[$i]->price}}</span>
                                    @endif
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{"/home/product-details/".$dis_products[$i]->id."/".$dis_products[$i]->category_id}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        <a class="text-body add-to-cart" href={{"/home/save/".$dis_products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="col-12 text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0">

                <div class="row g-4">
                    @for ($i=0,$sec=0.1; $i<$new_products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="{{asset('user')}}/img-fluid w-100" src="{{asset('products')}}/{{$new_products[$i]->image}}" alt="">
                                    <div class="position-absolute top-0 start-0 m-3 tag-container">
                                        <div class="bg-secondary rounded text-white py-1 px-3">New</div>
                                        <div class="bg-danger prod-sale rounded text-white py-1 px-3" data-discount="{{$new_products[$i]->discount_price}}">Sale</div>
                                    </div>

                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{"/home/product-details/".$new_products[$i]->id."/".$new_products[$i]->category_id}}>{{$new_products[$i]->title}}</a>
                                    @if ($new_products[$i]->discount_price == 1.00)
                                    <span class="text-primary me-1">{{"$".$new_products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$new_products[$i]->price - ($new_products[$i]->price * $new_products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$new_products[$i]->price}}</span>
                                    @endif
                                    <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{"/home/product-details/".$new_products[$i]->id."/".$new_products[$i]->category_id}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        <a class="text-body add-to-cart" href={{"/home/save/".$new_products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="col-12 text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>