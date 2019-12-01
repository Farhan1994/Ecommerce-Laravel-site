@extends('user.partials.master')
@section('content')	


<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container wrapper">
            <div class="row cart-head">
                <div class="container">
                <div class="row">
                    <p></p>
                </div>
                <div class="row">
                    <p></p>
                </div>
                </div>
            </div>    
            <div class="row cart-body">
                <form class="form-horizontal" method="post" action="{{ route('checkouts.store') }}">
                @csrf
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-push-6 col-sm-push-6">
                    <!--REVIEW ORDER-->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Review Order <div class="pull-right"><strong><a class="afix-1" href="{{ route('carts') }}">Edit Cart</a></strong></div>
                        </div>
                        @if (App\Models\Cart::totalItems() > 0)
                        <div class="panel-body">
                            
                                
                                @php
                                    $total_price = 0;
                                @endphp
                            @foreach (App\Models\Cart::totalCarts() as $cart)
                            <div class="form-group">
                                <div class="col-sm-3 col-xs-3">
                                        @if ($cart->product->images->count() > 0)
                                            <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                                        @endif
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="col-xs-12"><a href="{{ route('products.details', $cart->product->slug) }}">{{ $cart->product->title }}</a></div>
                                    <div class="col-xs-12"><strong>Quantity:<span>{{ $cart->product_quantity }}</span></strong></div>
                                </div>
                                <div class="col-sm-3 col-xs-3 text-right">
                                    <h6>@php
                                    $total_price += $cart->product->price * $cart->product_quantity;
                                    @endphp

                                    {{ $cart->product->price * $cart->product_quantity }} <span>Tk</span>
                                    </h6>
                                </div>
                            </div>
                            @endforeach
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Subtotal</strong>
                                    <div class="pull-right"><span>
                                    {{ $total_price }} Taka
                                    </span></div>
                                </div>
                                <div class="col-xs-12">
                                    <strong>Shipping</strong>
                                    <div class="pull-right"><span>100 Tk</span></div>
                                </div>
                            </div>
                            <div class="form-group"><hr /></div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <strong>Order Total</strong>
                                    <div class="pull-right"><span>
                                    @php
                                    $total_price += 100;
                                    @endphp
                                    {{ $total_price }} Taka</span></div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!--REVIEW ORDER END-->
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-md-pull-6 col-sm-pull-6">
                    <!--SHIPPING METHOD-->
                    <div class="panel panel-info">
                        <div class="panel-heading">Address</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h4>Shipping Address</h4>
                                </div>
                            </div>
                            <form action="{{ route('checkouts.store') }}">
                            
                            <div class="form-group">
                                <div class="span1"></div>
                                <div class="col-md-6 col-xs-12">
                                    <strong>Full Name:</strong>
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name : '' }}" />
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Shipping Address:</strong></div>
                                <div class="col-md-12">
                                    <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address : '' }}</textarea>

                                @if ($errors->has('shipping_address'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('shipping_address') }}</strong>
                                </span>
                                @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Additional Message:</strong></div>
                                <div class="col-md-12">
                                    <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>

                                    @if ($errors->has('message'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Phone Number:</strong></div>
                                <div class="col-md-12"><input id="phone_no" type="text" class="form-control{{ $errors->has('phone_no') ? ' is-invalid' : '' }}" name="phone_no" value="{{ Auth::check() ? Auth::user()->phone_no : '' }}" required>

                                    @if ($errors->has('phone_no'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12"><strong>Email Address:</strong></div>
                                <div class="col-md-12"><input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ Auth::check() ? Auth::user()->email : '' }}" />
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!--SHIPPING METHOD END-->
                    <!--CREDIT CART PAYMENT-->
                    <div class="panel panel-info">
                        <div class="panel-heading"><span><i class="glyphicon glyphicon-lock"></i></span> Secure Payment</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12"><strong>Card Type:</strong></div>
                                <div class="col-md-12">
                                    <select id="payments" name="payment_method_id" class="form-control">
                                        <option value="">Select a payment method please</option>
                                        @foreach ($payments as $payment)
                                        <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @foreach ($payments as $payment)
                                @if ($payment->short_name == "cash_in")
                                    <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden">
                                        <h3>
                                            For Cash in there is nothing necessary. Just click Finish Order.
                                            <br>
                                        <small>
                                            You will get your product in two or three business days.
                                        </small>
                                        </h3>
                                    </div>
                                @else
                                    <div id="payment_{{ $payment->short_name }}" class="alert alert-success mt-2 text-center hidden"
                                        <h3>{{ $payment->name }} Payment</h3>
                                        <p>
                                        <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>
                                            <br>
                                        <strong>Account Type: {{ $payment->type }}</strong>
                                        </p>
                                        <div class="alert alert-success">
                                            Please send the above money to this Bkash No and write your transaction code below there..
                                        </div>

                                        </div>  
                                @endif
                            @endforeach
                            <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-submit-fix">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--CREDIT CART PAYMENT END-->
                </div>
                
                </form>
            </div>
            <div class="row cart-footer">
        
            </div>
    </div>


@endsection


@section('scripts')
  <script type="text/javascript">
  $("#payments").change(function(){
    $payment_method = $("#payments").val();
    if ($payment_method == "cash_in") {
      $("#payment_cash_in").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#payment_nogod").addClass('hidden');
    }else if ($payment_method == "bkash") {
      $("#payment_bkash").removeClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#payment_nogod").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "rocket") {
      $("#payment_rocket").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#payment_nogod").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "nogod") {
      $("#payment_nogod").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  })
  </script>
@endsection
