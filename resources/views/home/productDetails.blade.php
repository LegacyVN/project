howwho<!DOCTYPE html>
<html lang="en">

<head>
	@include('home.css')
</head>

<body>
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
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb-section -->

	<!-- single product -->
	
	<div class="single-product mt-150 mb-150" id="single-product-ref">
		<div class="container">
			<div class="row">
				<div class="single-product-container col-md-5">
					<div class="single-product-img image-magnifier-container">
						<img id="product-image" src="{{asset("products")}}/{{$product->image}}" alt="">
						<div id="magnifier" class="magnifier"></div>
					</div>
					<!-- <div class="single-product-carousel1"></div> -->
					<div class="single-product-carousel owl-carousel owl-loaded">
						@for ($i=0 ; $i<$photo->count(); $i++)
							<div class="owl-item"><img src="{{asset('products')}}/{{$photo[$i]->photo_name}}" alt=""></div>
							@endfor
							<div class="owl-nav">
							</div>
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$product->title}}</h3>
						<div class="rating">
							<p class="text-left">
								<a href="#" class="mr-2 rating_avg">{{$reviews_avg}}</a>
								<span class="rate-star-wrap">
									@for ($i=0;$i<5;$i++)
										<span>
										<input type="checkbox" id="{{"total-score".$i+1}}" name="rate_score" value="{{$i+1}}" disabled>
										<label class="star-label" for="{{"total-score".$i+1}}"></label>
								</span>
								@endfor
								</span>
							</p>
							@if (isset($reviews) && isset($orders_detail))
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">{{$reviews->count()}} <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">{{$orders_detail->count()}} <span style="color: #bbb;">Sold</span></a>
							</p>
							@else
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Sold</span></a>
							</p>
							@endif

						</div>
						
						@if ($product->discount_price > 0.00)
						<p class="single-product-pricing text-primary">{{"$".$product->price - ($product->price * $product->discount_price)}}</p>
						<p class="single-product-pricing fs-5 text-decoration-line-through">{{"$".$product->price}}</p>
						@else
						<p class="single-product-pricing text-primary">{{"$".$product->price}}</p>
						@endif
						<div class="single-product-form">
							<form method="post" action={{ url('/home/save-post/' . $product->id) }}>
								@csrf
								<input name="form-quantity" type="number" min="1" max="{{$product->quantity}}" placeholder="1">
								<p>In Stock: {{$product->quantity}}</p>
								<button type="submit" class="btn btn-primary rounded-pill py-sm-2 px-sm-3">
									<i class="fas fa-shopping-cart"></i> Add to Cart
								</button>
							</form>

							<p><strong>Category: </strong>{{$product->category->cat_name}}</p>
							<hr>
							<h4>Share:</h4>
							<ul class="product-share">
								<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
								<li><a href=""><i class="fab fa-twitter"></i></a></li>
								<li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
								<li><a href=""><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				
				</div>
			</div>
			<!-- review row  -->
			<div class="row row-review mt-5">
				<!-- Tabs  -->
				<div class="col-md-12 nav-link-wrap">
					<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
						aria-orientation="vertical">
						<a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
							href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
						<a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3"
							role="tab" aria-controls="v-pills-3" aria-selected="false">Reviews</a>
					</div>
				</div>
				<!-- Inside tabs -->
				<div class="col-md-12 tab-wrap">
					<div class="tab-content bg-light" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
							aria-labelledby="day-1-tab">
							<div class="p-4">
								<p>{{$product->description}}</p>
								<h3 class="mb-4">Enhance Your Dishes with the Aromatic Blend of Masala</h3>
								<p>Prepare to embark on a flavourful journey like no other with Masala, a spice blend that encapsulates the very essence of Indian cuisine. Crafted using age-old recipes from the heart of Indian kitchens, this aromatic masterpiece is your ticket to unparalleled flavour and culinary excellence. </p>
								<h4>Aromatic Perfection:</h4>
								<p>Surya Authentic Garam Masala Powder is a testament to our commitment to quality. It is prepared from highly aromatic spices that are handpicked for their superior fragrance and flavour. With every pinch, you'll experience the delightful aroma of a harmonious blend of 21 spices, carefully balanced to perfection. </p>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
							<div class="row p-4">
								<!-- Main Rating Body  -->
								<div class="col-md-7">
									<!-- Reviews Count  -->
									@if (isset($reviews))
									<h3 class="mb-4">{{$reviews->count()." Reviews "}}</h3>
									@else
									<h3 class="mb-4">0 Review</h3>
									@endif

									<!-- Empty Review Box -->
									@if (isset($orders_detail) && Auth::check())
									@foreach ($orders_detail as $order_detail)
									@if ($order_detail->order->user_id == Auth::id() && $review_validity == true)
									<div class="review review-empty" data-authid="{{Auth::id()}}">
									<div class="flex-shrink-0 rounded-circle" src="{{asset('user')}}/img/avatar.png"></div>
										<form method="post" action="{{ url('rate/' . Auth::id() . '/' . $order_detail->product_id) }}">
											@csrf
											<div class="desc row g-3">
												<div class="col-md-6">
													<div class="form-floating">
														<div class="rate-star-wrap">
															@for ($i=0;$i<5;$i++)
																<div><input type="checkbox" id="{{"score".$i+1}}" name="rate_score" value="{{$i+1}}">
																<label class="star-label" for="{{"score".$i+1}}"></label></div>
														@endfor
													</div>
													<textarea class="form-control" placeholder="Leave a review" name="rate_comment" required></textarea>
													<div class="invalid-feedback">Please input your Review</div>
													<button class="btn btn-primary rounded-pill py-2 px-3 mt-3" type="submit">Comment</button>
												</div>
											</div>
									</div>
									</form>

								</div>
								@break
								@endif
								@endforeach
								@endif
								<!-- The Reviews  -->
								@if (isset($reviews))
								@foreach ($reviews as $review)
								<div class="review reviewed">
									<div class="desc">
										<h4>
											<span class="text-left">{{$review->user->name}}</span>
											<span class="text-right">{{DateTime::createFromFormat("Y-m-d H:i:s", $review->created_at)->format("d F Y")}}
												<span class="text-right"><a href="#" class="reply">Reply<i
															class="bi bi-reply-fill"></i></a></span>
											</span>
										</h4>
										<div class="star">
											<div class="rate-star-wrap" id="{{"rateid-".$review->rate_id}}" data-rateid="{{$review->rate_id}}" data-ratescore="{{$review->rate_score}}">
												@for ($i=0;$i<5;$i++)
													<div>
													<input type="checkbox" id="{{"scored".$i+1}}" name="rate_score" value="{{$i+1}}" disabled>
													<label class="star-label" for="{{"scored".$i+1}}"></label>
											</div>
											@endfor
										</div>
									</div>
									<p>{{$review->rate_comment}}</p>
								</div>
							</div>
							@endforeach
							@endif
						</div>
						<!-- Rating Overview  -->
						<div class="col-md-4">
							<div class="rating-wrap">
								<h3 class="mb-4">{{$product->title."'s Rating Overview"}}</h3>
								<p class="star">
									<span>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										({{$reviews_overview[1][4] . "%"}})
									</span>
									<span>{{$reviews_overview[0][4] . " Reviews"}}</span>
								</p>
								<p class="star">
									<span>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										({{$reviews_overview[1][3] . "%"}})
									</span>
									<span>{{$reviews_overview[0][3] . " Reviews"}}</span>
								</p>
								<p class="star">
									<span>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										({{$reviews_overview[1][2] . "%"}})
									</span>
									<span>{{$reviews_overview[0][2] . " Reviews"}}</span>
								</p>
								<p class="star">
									<span>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										({{$reviews_overview[1][1] . "%"}})
									</span>
									<span>{{$reviews_overview[0][1] . " Reviews"}}</span>
								</p>
								<p class="star">
									<span>
										<i class="bi bi-star-fill"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										<i class="bi bi-star"></i>
										({{$reviews_overview[1][0] . "%"}})
									</span>
									<span>{{$reviews_overview[0][0] . " Reviews"}}</span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">
						<h3><span class="orange-text">Related</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				@foreach ($rel_products as $rel_product)
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href={{"/home/product-details/".$rel_product->id."/".$rel_product->category_id}}><img src="{{asset("products")}}/{{$rel_product->image}}" alt=""></a>
						</div>
						<h3>{{$rel_product->title}}</h3>
						<p class="product-price">{{"$".$rel_product->price}} </p>
						<a href="{{"/home/save/".$rel_product->id}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- end more products -->

	<!-- Footer Start  -->
	@include('home.footer')

	<!-- JAVASCRIPT LIBRARIES-->
	@include('home.js')
</body>

</html>