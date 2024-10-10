<!DOCTYPE html>
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
	<div class="single-product mt-150 mb-150">
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
						<div class="rating d-flex gap-3">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">0.0</a>
								<a href="#"><span class="bi bi-star"></span></a>
								<a href="#"><span class="bi bi-star"></span></a>
								<a href="#"><span class="bi bi-star"></span></a>
								<a href="#"><span class="bi bi-star"></span></a>
								<a href="#"><span class="bi bi-star"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Rating</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">0 <span style="color: #bbb;">Sold</span></a>
							</p>
						</div>
						<!-- <p class="single-product-pricing"><span>Per Kg</span> {{"$".$product->price}}</p> -->
						@if ($product->discount_price < 1.00)
							<p class="single-product-pricing text-primary">{{"$".$product->price - ($product->price * $product->discount_price)}}</p>
							<p class="single-product-pricing fs-5 text-decoration-line-through">{{"$".$product->price}}</p>
							@elseif ($product->discount_price == 1.00 || is_null($product->discount_price)==true)
							<p class="single-product-pricing text-primary">{{"$".$product->price}}</p>
							@endif
							<div class="single-product-form">
								<form method="post" action={{ url('/home/save-post/' . $product->id) }}>
									@csrf
									<input name="form-quantity" type="number" placeholder="0">
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
								<h3 class="mb-4">Enhance Your Dishes with the Aromatic Blend of Surya Garam Masala</h3>
								<p>Prepare to embark on a flavourful journey like no other with Surya Garam Masala, a spice blend that encapsulates the very essence of Indian cuisine. Crafted using age-old recipes from the heart of Indian kitchens, this aromatic masterpiece is your ticket to unparalleled flavour and culinary excellence. </p>
								<h4>Aromatic Perfection:</h4>
								<p>Surya Authentic Garam Masala Powder is a testament to our commitment to quality. It is prepared from highly aromatic spices that are handpicked for their superior fragrance and flavour. With every pinch, you'll experience the delightful aroma of a harmonious blend of 21 spices, carefully balanced to perfection. </p>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
							<div class="row p-4">
								<div class="col-md-7">
									<h3 class="mb-4">23 Reviews</h3>
									<div class="review review-empty">
										<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
										<div class="desc">
											<p class="star">
												<span>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
												</span>												
											</p>
											<textarea name="comment"></textarea>
										</div>
									</div>
									<div class="review">
										<div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
										<div class="desc">
											<h4>
												<span class="text-left">Jacob Webb</span>
												<span class="text-right">14 March 2018</span>
											</h4>
											<p class="star">
												<span>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
													<i class="bi bi-star"></i>
												</span>
												<span class="text-right"><a href="#" class="reply"><i
															class="bi bi-reply-fill"></i></a></span>
											</p>
											<p>When she reached the first hills of the Italic Mountains, she had a last
												view back on the skyline of her hometown Bookmarksgrov</p>
										</div>
									</div>
									
								</div>
								<div class="col-md-4">
									<div class="rating-wrap">
										<h3 class="mb-4">{{$product->title."'s Rating Overview"}}</h3>
										<p class="star">
											<span>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												(98%)
											</span>
											<span>20 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												(85%)
											</span>
											<span>10 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												(98%)
											</span>
											<span>5 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												(98%)
											</span>
											<span>0 Reviews</span>
										</p>
										<p class="star">
											<span>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												<i class="bi bi-star"></i>
												(98%)
											</span>
											<span>0 Reviews</span>
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

	<!-- review section start -->


	<!-- review section end -->

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
						<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
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