@extends('auth.master')

@section('content')

                    
               <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    @csrf
                    <span class="login100-form-title">
                        Reset Password
                    </span>

                    
                    @include('user.extra.messages')


                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input id="email" class="input100{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                    <div class="text-center p-t-12">
                        <a class="txt2" href="{{ route('login') }}">
                            Login here...
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>

@endsection
