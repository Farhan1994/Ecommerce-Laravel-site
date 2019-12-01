@extends('auth.master')

@section('content')
                <form class="login100-form validate-form" method="POST" action="{{ route('password.request') }}">
                    @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                    <span class="login100-form-title">
                        Reset Password
                    </span>

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
                        <input class="input100{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" type="password" placeholder="Confirm Password" value="{{ $email or old('email') }}">
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>



                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Reset Password
                        </button>
                    </div>


                </form>


@endsection
