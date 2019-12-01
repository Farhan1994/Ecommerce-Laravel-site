@extends('user.partials.master')

@section('content')
  <!-- Start Sidebar + Content -->
  @include('user.extra.messages')
  @include('user.backup.slider')

  
					

					<!-- Product -->
					@include('user.backup.product.products')

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				

  <!-- End Sidebar + Content -->
@endsection
