@extends('auth.master')

@section('content')
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                @csrf
                    <span class="login100-form-title">
                        Member Registration
                    </span>

                    <div class="wrap-input100 validate-input" data-validate = "first name is required">
                        <input id="first_name" class="input100{{ $errors->has('first_name') ? ' is-invalid' : '' }}" type="text" name="first_name" placeholder="Firstname" value="{{ old('first_name') }}" required autofocus>
                        @if ($errors->has('first_name'))
                        <span class="invalid-feedback">
                             <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "last name is required">
                        <input id="last_name" class="input100{{ $errors->has('last_name') ? ' is-invalid' : '' }}" type="text" name="last_name" placeholder="Lastname" value="{{ old('last_name') }}" required autofocus>
                        @if ($errors->has('last_name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid Phone number is required: 01900000000">
                        <input id="phone_no" class="input100{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" type="text" name="phone_no" placeholder="Phone" value="{{ old('phone_no') }}" required>
                        @if ($errors->has('phone_no'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone_no') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </span>
                    </div>

                     <div class="wrap-input100 validate-input" >
                        <select id="division_id" class="input100" type="text" name="division_id"  required>
                        <option value="">Select your division</option>

                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"><i class="fa fa-home"></i>{{ $division->name }}</option>
                        @endforeach
                        
                        </select>
                    </div>

                    <div class="wrap-input100 validate-input" >
                        
                        <select id="district_id" class="input100" type="text" name="district_id"  required>
                        <option value="">Select your district</option>

                        @foreach ($districts as $district)
                           <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach

                            <!-- <select class="input100" name="district_id" id="district-area" >
                                <option value="">Select your district</option>
                                
                            </select> -->
                        </select>
                    </div> 

                     <div class="wrap-input100 validate-input" data-validate = "Address is required">
                        <input id="street_address" class="input100{{ $errors->has('street_address') ? ' is-invalid' : '' }}" type="text" name="street_address" placeholder="Address" value="{{ old('street_address') }}" required autofocus>
                        @if ($errors->has('street_address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('street_address') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </span>
                    </div>


                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" type="password" name="password" placeholder="Password">
                        @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="confirmpassword" name="confirmpass" placeholder="Confirm Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Sign up
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        Already have an account?
                        <a class="txt2" href="{{ route('login') }}">
                            Login here...
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>

                    
                </form>


@endsection

@section('scripts')



<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

  <script type="text/javascript">
      $("#division_id").change(function(){
        var division = $("#division_id").val();
        // Send an ajax request to server with this division
        $("#district-area").html("");
        var option = "";

        $.get( "http://localhost/AdminPanelOfE-commerce/public/get-districts/"+division, function( data ) {

            data = JSON.parse(data);
            data.forEach( function(element) {
              option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
            });

          $("#district-area").html(option);

        });
    })
  </script>



















@endsection
