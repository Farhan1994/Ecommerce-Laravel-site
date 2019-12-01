@extends('user.partials.master')
@section('content')
	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(user/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Products
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				
				@include('user.backup.product.sidebar')

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					

					<!-- Product -->
					@include('user.backup.product.products')

					<!-- Pagination -->
					
				</div>
			</div>
		</div>
	</section>
@endsection