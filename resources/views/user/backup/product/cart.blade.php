@extends('user.partials.master')
@section('content')	

	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
				@if (App\Models\Cart::totalItems() > 0)
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
						</tr>

						@php
          					$total_price = 0;
          				@endphp
          				@foreach (App\Models\Cart::totalCarts() as $cart)

						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									@if ($cart->product->images->count() > 0)
                  						<img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                					@endif
								</div>
							</td>
							<td class="column-3"><a href="{{ route('products.details', $cart->product->slug) }}">{{ $cart->product->title }}</a></td>
							<td class="column-2"><a href="{{ route('products.details', $cart->product->slug) }}">{{ $cart->product->price }} Taka</a></td>
							<td class="column-4">
								
								<form class="form-inline" action="{{ route('carts.update', $cart->id) }}" method="post">
								@csrf
									

									<input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                  						<button type="submit" class="btn btn-success ml-1">Update</button>
								</form>
										<br>	
								<form class="form-inline" action="{{ route('carts.delete', $cart->id) }}" method="post">
                  					@csrf
                  						<input type="hidden" name="cart_id" />
                  							<button type="submit" class="btn btn-danger ml-1 fa fa-trash"></button>
                				</form>					
							</td>
							<td class="column-5">
								@php
                					$total_price += $cart->product->price * $cart->product_quantity;
                					@endphp

                					{{ $cart->product->price * $cart->product_quantity }} Taka
							</td>
							
						</tr>
						@endforeach
					</table>
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>


			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						{{ $total_price }} Taka
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<span class="m-text21 w-size20 w-full-sm">
						100tk
						</span>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
									@php
                					$total_price += 100;
                					@endphp
						{{ $total_price }} Taka
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<a href="{{ route('checkouts') }}">
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
					</a>
					<br>
					<br>
					<a href="{{ route('products') }}">
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Continue Shopping....
					</button>
					</a>
				</div>
			</div>
			@else
      <div class="alert alert-warning">
        <strong>There is no item in your cart.</strong>
        <br>
        <a href="{{ route('products') }}" class="btn btn-info btn-lg">Continue Shopping..</a>
      </div>
    @endif
		</div>

	</section>
@endsection