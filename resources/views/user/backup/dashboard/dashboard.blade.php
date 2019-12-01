@extends('user.partials.master')
@section('content')

	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-05.jpg);">
		<h2 class="l-text2 t-center">
			Welcome {{ $user->first_name . ' '. $user->last_name }}
		</h2>
		<p class="m-text13 t-center">
			You can change your profile and every informations here..
		</p>
	</section>




  <div class='container'>
    

    <div class="wrap_menu">
      <div class="col-md-4" onclick="location.href='{{ route('user.profile') }}'">
      	<div class="header-cart-wrapbtn">
      		<br>
      		<br>
									<!-- Button -->
				<a href="{{ route('user.profile') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
					Update Profile
				</a>
				<br>
				<br>
				<a href="{{ route('login') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
					Cart
				</a>
				<br>
				<br>
				<a href="{{ route('login') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
					Order History
				</a>
		</div>
      </div>
    </div>
  </div>

@endsection