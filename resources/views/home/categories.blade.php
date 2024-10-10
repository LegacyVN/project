<div class="container-xxl py-5" id="nav-products">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Products Catalogue</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    @foreach ($categories as $category)
                    <li class="nav-item me-2" id="{{$category->id}}">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href={{"#cat-tab-" . $category->id}}>{{$category->cat_name}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="tab-content">
            @for ($j=0; $j<$categories->count(); $j++)
                <div id={{"cat-tab-".$categories[$j]->id}} class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @for ($i=0,$sec=0.1; $i<$products->count(); $i++,$sec+0.2)
                            @if ($products[$i]->category_id == $categories[$j]->id)
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay={{$sec."s"}}>
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="{{asset('user')}}/img-fluid w-100" src="{{asset("products")}}/{{$products[$i]->image}}" alt="">
                                        <div class="position-absolute top-0 start-0 m-3 tag-container">
                                            <div class="bg-secondary rounded text-white py-1 px-3">New</div>
                                            <div class="bg-danger prod-sale rounded text-white py-1 px-3" data-discount="{{$products[$i]->discount_price}}">Sale</div>
                                        </div>
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href={{"/home/product-details/".$products[$i]->id."/".$products[$i]->category_id}}>{{$products[$i]->title}}</a>
                                        @if ($products[$i]->discount_price == 0.00 || $products[$i]->discount_price == '')
                                        <span class="text-primary me-1">{{"$".$products[$i]->price}}</span>
                                        @else
                                        <span class="text-primary me-1">{{"$".$products[$i]->price - ($products[$i]->price * $products[$i]->discount_price)}}</span>
                                        <span class="text-body text-decoration-line-through">{{"$".$products[$i]->price}}</span>
                                        @endif
                                        <!-- <span class="text-body text-decoration-line-through">$29.00</span> -->
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href={{"/home/product-details/".$products[$i]->id."/".$products[$i]->category_id}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2 add-to-cart">
                                            <a class="text-body add-to-cart" href={{"/home/save/".$products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endfor
                            <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                                <a class="btn btn-primary rounded-pill py-3 px-5" href="">Browse More Products</a>
                            </div>
                    </div>
                </div>
                @endfor
        </div>

    </div>
</div>