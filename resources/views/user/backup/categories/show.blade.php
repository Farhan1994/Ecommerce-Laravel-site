@extends('user.partials.master')
@section('content')
<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				
				@include('user.backup.product.sidebar')

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					

					<h3> All Products in <span class="badge badge-info">{{ $category->name }} Category</span></h3>
          @php
          $products = $category->products()->paginate(9);
          @endphp

          @if ($products->count() > 0)
            @include('user.backup.product.products')
          @else
            <div class="alert alert-warning">
              No Products has added yet in this category !!
            </div>
          @endif
					
				</div>
			</div>
		</div>
	</section>
@endsection