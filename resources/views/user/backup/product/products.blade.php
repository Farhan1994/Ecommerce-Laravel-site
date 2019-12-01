<section class="bgwhite p-t-45 p-b-58">
		<div class="container">
			<div class="sec-title p-b-22">
				<h3 class="m-text5 t-center">
					Our Products
				</h3>
			</div>

			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#best-seller" role="tab">Best Seller</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#featured" role="tab">Featured</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#sale" role="tab">Sale</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#top-rate" role="tab">Top Rate</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-35">
					<!-- - -->
					<div class="tab-pane fade show active" id="best-seller" role="tabpanel">
						<div class="row">


							
						@foreach ($products as $product)
							<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
								<!-- Block2 -->
								<div class="block2">
									<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
										@php $i = 1; @endphp
										@foreach ($product->images as $image)
          									@if ($i > 0)
              									
                									<img src="{{asset('images/products/'. $image->image)}}" alt="IMG-PRODUCT">
              									
          									@endif

          									@php $i--; @endphp
        								@endforeach

										
										
									

										

										<div class="block2-overlay trans-0-4">
											<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
												<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
												<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
											</a>
											<form action="{{ route('carts.store') }}" method="post">
											@csrf
												<div class="block2-btn-addcart w-size1 trans-0-4">
												<!-- Button -->
												<input type="hidden" name="product_id" value="{{ $product->id }}">
													<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" onclick="addToCart({{ $product->id }})">
														Add to Cart
													</button>
												</div>
											</form>
										</div>
									</div>

									<div class="block2-txt p-t-20">
										<a href="{!! route('products.details', $product->slug) !!}" class="block2-name dis-block s-text3 p-b-5">
											{{ $product->title }}
										</a>

										<span class="block2-price m-text6 p-r-5">
											{{ $product->price }}
										</span>
									</div>
								</div>
							</div>
						@endforeach
						</div>
					</div>


							
						</div>
					</div>
				</div>
			
					<div class="pagination">
						{{ $products->links() }}
					</div>
	</section>
