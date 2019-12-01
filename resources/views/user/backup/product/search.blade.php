@extends('user.partials.master')
@section('content')
	
	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				
				@include('user.backup.product.sidebar')

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					
					<h3> Searched Products For - <span class="badge badge-primary">{{ $search }}</span></h3>
					<!-- Product -->
					@include('user.backup.product.products')

					<!-- Pagination -->
					
				</div>
			</div>
		</div>
	</section>
@endsection