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
						<p>Fresh and Organic</p>
						<h1>Cart</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								@if (isset($products))
									@for ($i=0; $i<count($products); $i++)
										<tr class="table-body-row" id="{{$products[$i]->id}}" data-prodid="{{$products[$i]->id}}" data-price="{{$final_prices[$i]}}">
											<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
											<td class="product-image"><a href={{url("/home/product-details/".$products[$i]->id."/".$products[$i]->category_id)}}>
												<img src="{{asset("products")}}/{{$products[$i]->image}}" alt="">
											</a></td>
											<td class="product-name">{{$products[$i]->title}}</td>
											<td class="product-price">{{"$".$final_prices[$i]}}</td>
											<td class="product-quantity single-product-form" id={{"prod-".$products[$i]->id}}>
												<form action={{url("/update-cart")}} method="POST">
													@csrf
													<input class="cart-quantity" data-comparison="{{$quantity[$i]}}" type="number" value="{{$quantity[$i]}}">
												</form>
											</td>
											<td class="product-total">{{"$".$final_prices[$i] * $quantity[$i]}}</td>
										</tr>
									@endfor
								@else
								<tr class="table-body-row">
											Cart is empty
								</tr>
								@endif
								
							</tbody>
						</table>
					</div>
				</div>
				<!-- Customer's Info  -->
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
							<div class="card single-accordion">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
										<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											Address
										</button>
									</h5>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="billing-address-form">
											<form action="index.html">
												<p><input type="text" placeholder="Name"></p>
												<p><input type="email" placeholder="Email"></p>
												<p><input type="text" placeholder="Address"></p>
												<p><input type="tel" placeholder="Phone"></p>
												<p><textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>

				<!-- Total Price's Info  -->
				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
							@if (isset($products))
							<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="event-subtotal" data-subtotal ={{$subtotal}}>{{"$".$subtotal}}<td>
							</tr>
							@else 
							<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="event-subtotal">$0<td>
							</tr>
							@endif
								
								<!-- <tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td class="event-shipping">0</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="event-total">$0</td>
								</tr> -->
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="/home/cart" class="btn btn-primary rounded-pill">Update Cart</a>
							<a href={{url("/order")}} class="btn btn-secondary rounded-pill">Order Now</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input class="btn btn-primary rounded-pill" type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- Footer Start  -->
	@include('home.footer')

	<!-- JAVASCRIPT LIBRARIES-->
	@include('home.js')
</body>

</html>