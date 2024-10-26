<!DOCTYPE html>
<html lang="en">

<head>
	@include('home.css')
</head>

<body>
	<!-- Cart is Empty Model  -->
	<div class="modal fadeInUp wow" data-wow-delay="0.0s" id="order_modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Notice</h5>					
				</div>
				@if (isset($products))
					<div class="modal-body">
						<p>Order Completed</p>
					</div>
					<div class="modal-footer">
						<a href={{url("/order")}} class="btn btn-secondary">Close</a>
					</div>
				@else
					<div class="modal-body">
						<p>Your Cart is Empty</p>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				@endif
				
			</div>
		</div>
	</div>
	
	<!-- Header Start  -->
	@include('home.header')
	<!-- Header End   -->

	<!-- Breadcrumb Section -->
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
	<!-- End Breadcrumb Section -->

	<!-- Cart -->
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
									<td class="product-remove"><a href={{url("/cart/delete/".$products[$i]->id)}} onclick="return confirm('Are you sure?')"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><a href={{url("/home/product-details/".$products[$i]->id."/".$products[$i]->category_id)}}>
											<img src="{{asset("products")}}/{{$products[$i]->image}}" alt="">
										</a></td>
									<td class="product-name">{{$products[$i]->title}}</td>
									<td class="product-price">{{"$".$final_prices[$i]}}</td>
									<td class="product-quantity single-product-form" id={{"prod-".$products[$i]->id}}>
										<form action={{url("/update-cart")}} method="POST">
											@csrf
											<input class="cart-quantity quantity-limit" data-comparison="{{$quantity[$i]}}" type="number" min="1" max="{{$products[$i]->quantity}}" value="{{$quantity[$i]}}">
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
									<td class="event-subtotal" data-subtotal={{$subtotal}}>{{"$".$subtotal}}
									<td>
								</tr>
								@else
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="event-subtotal">$0
									<td>
								</tr>
								@endif
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href={{url("home/cart")}} class="btn btn-primary rounded-pill">Refresh Cart</a>
							@if (Auth::check() && Auth::user()->email_verified_at != NULL)
							<button type="button" class="btn btn-secondary rounded-pill" data-bs-toggle="modal" data-bs-target="#order_modal">
								Order Now
							</button>
							@else
							<a href={{url("/register")}} class="btn btn-secondary rounded-pill">Order Now</a>
							@endif

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