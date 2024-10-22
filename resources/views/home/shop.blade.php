<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body></body>
<!-- Header Start  -->
@include('home.header')
<!-- Header End   -->

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>See more Details</p>
                    <h1>Browse Products</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb-section -->

<!-- products -->
<div class="d-none">
    @if(session('products'))
    {{$products = session('products')}}
    @endif
</div>

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="product-filters">
                    <h4 class="d-block text-left mt-150">Categories</h4>                   
                    <div class="col-lg-12 text-start text-lg-start">
                        <ul class="nav nav-pills d-inline-flex">
                            <li class="nav-item me-2" id="0">
                                <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href={{"#cat-tab-0"}}>All</a>
                            </li>
                            @foreach ($categories as $category)
                            <li class="nav-item me-2" id="{{$category->id}}">
                                <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href={{"#cat-tab-" . $category->id}}>{{$category->cat_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                @if (Session::has("msg"))
                {{Session::get("msg")}}
                @endif
                <div class="product-filters">
                    <h4 class="d-block text-left mt-150">Filters And Sort</h4>
                    <div id="filter-form" class="col-lg-12 text-start text-lg-start">
                        <form class="d-flex gap-2" method="post" action="{{ url('/filter') }}">
                            @csrf
                            <input type="text" name="filter-min" placeholder="Minimum Price" value="{{ old('filter-min') }}"> -
                            <input type="text" name="filter-max" placeholder="Maximum Price" value="{{ old('filter-max') }}"> |                            
                            <input type="checkbox" value="1" id="filter-status" class="form" name="filter-status" {{ old('filter-status') ? 'checked' : '' }}>
                            <label for="form-status">In Stock</label>

                            <select name="filter-sort" id="filter-sort">
                                <option value="0">All</option>
                                <option value="1" {{old('filter-sort') == '1' ? 'selected' : '' }}>A to Z</option>
                                <option value="2" {{old("filter-sort") == "2" ? 'selected' : ''}}>Z to A</option>
                                <option value="3" {{old("filter-sort") == "3" ? 'selected' : ''}}>Lowest Price</option>
                                <option value="4" {{old("filter-sort") == "4" ? 'selected' : ''}}>Highest Price</option>
                                
                            </select>

                            <button type="submit" class="btn btn-primary rounded-pill ms-2">Go</button>
                            <a href={{url("/home/browse-products")}} class="btn btn-secondary rounded-pill ms-2">Reset List</a>
                            <input type="text" class="filter-cat hidden" name="filter-cat" value="0">
                        </form>
                    </div>                  
                </div>
            </div>
        </div>

        <div class="row tab-content">
            <div id={{"cat-tab-0"}} class="tab-pane fade show p-0">
                <div class="row g-4">
                    @for ($i=0,$sec=0.1; $i<$products->count(); $i++,$sec+0.2)
                        <div class="col-xl-3 col-lg-4 col-md-6 fadeInUp" data-wow-delay={{$sec."s"}}>
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="{{asset('user')}}/img-fluid w-100" src="{{asset("products")}}/{{$products[$i]->image}}" alt="">
                                    <div class="bg-secondary prod-new rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3">New</div>
                                    <div class="bg-danger prod-sale rounded text-white position-absolute end-0 top-0 py-1 px-2" data-discount="{{$products[$i]->discount_price}}">{{"-" . $products[$i]->discount_price*100 . "%"}}</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href={{"/home/product-details/".$products[$i]->id."/".$products[$i]->category_id}}>{{$products[$i]->title}}</a>
                                    @if ($products[$i]->discount_price == 0.00 || $products[$i]->discount_price == '')
                                    <span class="text-primary me-1">{{"$".$products[$i]->price}}</span>
                                    @else
                                    <span class="text-primary me-1">{{"$".$products[$i]->price - ($products[$i]->price * $products[$i]->discount_price)}}</span>
                                    <span class="text-body text-decoration-line-through">{{"$".$products[$i]->price}}</span>
                                    @endif                                
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href={{url("/home/product-details/".$products[$i]->id."/".$products[$i]->category_id)}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2 add-to-cart">
                                        @if ($products[$i]->quantity == 0)
                                        <a class="text-body add-to-cart"><span class="text-danger">Out of stock</span></a>
                                        @else
                                        <a class="text-body add-to-cart" href={{"/home/save/".$products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        @endif

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endfor
                </div>
            </div>
            @for ($j=0; $j<$categories->count(); $j++)
                <div id={{"cat-tab-".$categories[$j]->id}} class="tab-pane fade show p-0">
                    <div class="row g-4">
                        @for ($i=0,$sec=0.0; $i<$products->count(); $i++,$sec+0.2)
                            @if ($products[$i]->category_id == $categories[$j]->id)
                            <div class="col-xl-3 col-lg-4 col-md-6 fadeInUp" data-wow-delay={{$sec."s"}}>
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="{{asset('user')}}/img-fluid w-100" src="{{asset("products")}}/{{$products[$i]->image}}" alt="">
                                        <div class="bg-secondary prod-new rounded text-white position-absolute start-0 top-0 m-2 py-1 px-3">New</div>
                                        <div class="bg-danger prod-sale rounded text-white position-absolute end-0 top-0 py-1 px-2" data-discount="{{$products[$i]->discount_price}}">{{"-" . $products[$i]->discount_price*100 . "%"}}</div>
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
                                            <a class="text-body" href={{url("/home/product-details/".$products[$i]->id."/".$products[$i]->category_id)}}><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2 add-to-cart">
                                            @if ($products[$i]->quantity == 0)
                                            <a class="text-body add-to-cart"><span class="text-danger">Out of stock</span></a>
                                            @else
                                            <a class="text-body add-to-cart" href={{"/home/save/".$products[$i]->id}}><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                            @endif

                                        </small>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endfor                            
                    </div>
                </div>
                @endfor
        </div>

        <!-- <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
</div>
<!-- end products -->

<!-- Footer Start  -->
@include('home.footer')

<!-- JAVASCRIPT LIBRARIES-->
@include('home.js')
<script>
    $("#filter-sort").on("input", function() {
        console.log('act')
        $("#filter-sort-form").submit();
    });
</script>
</body>

</html>