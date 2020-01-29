@extends('layouts.frontend2.master')
@section('content')
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home2')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav>

    <div class="container">
        <ul class="checkout-progress-bar">
            <li class="active">
                <span>Shipping</span>
            </li>
            <li>
                <span>Review &amp; Payments</span>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Shipping Address</h2>

                        <form action="#">
                            <div class="form-group required-field">
                                <label>Email Address </label>
                                <div class="form-control-tooltip">
                                    <input type="email" class="form-control" required>
                                    <span class="input-tooltip" data-toggle="tooltip" title="We'll send your order confirmation here." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Password </label>
                                <input type="password" class="form-control" required>
                            </div><!-- End .form-group -->

                            <p>You already have an account with us. Sign in or continue as guest.</p>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary">LOGIN</button>
                                <a href="forgot-password.html" class="forget-pass"> Forgot your password?</a>
                            </div><!-- End .form-footer -->
                        </form>

                        <form action="{{route('customer.store')}}" method="post">
                            @csrf
                            <div class="form-group required-field">
                                <label>First Name </label>
                                <input type="text" name="first_name" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('first_name')
                                <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group required-field">
                                <label>Last Name </label>
                                <input type="text" name="last_name" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('last_name')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group">
                                <label>Company </label>
                                <input type="text" name="company" class="form-control">
                            </div><!-- End .form-group -->

                            <div class="form-group required-field">
                                <label>Street Address </label>
                                <input type="text" name="street_address" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('street_address')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group required-field">
                                <label>District  </label>
                                <input type="text" name="district" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('district')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group required-field">
                                <label>Zip/Postal Code </label>
                                <input type="text" name="zip" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('zip')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <div class="form-group required-field">
                                <label>Phone Number </label>
                                <div class="form-control-tooltip">
                                    <input type="tel" name="phone" class="form-control" >
                                    <span class="input-tooltip" data-toggle="tooltip" title="For delivery questions." data-placement="right"><i class="icon-question-circle"></i></span>
                                </div><!-- End .form-control-tooltip -->
                            </div><!-- End .form-group -->
                            @error('phone')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror
                            <div class="form-group required-field">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" >
                            </div><!-- End .form-group -->
                            @error('email')
                            <div class="pl-1 text-danger">{{$message}}</div>
                            @enderror

                            <button type="submit" class="btn btn-primary float-right">Place Order</button>

                        </form>
                    </li>

                </ul>
            </div><!-- End .col-lg-8 -->

            <div class="col-lg-4">
                <div class="order-summary">
                    <h3>Summary</h3>
                    @php
                        $count = 0;
                          if(is_array(session('cart'))){
                                $count = count(session('cart'));
                          }
                    @endphp
                    <h4>
                        <a data-toggle="collapse" href="#order-cart-section" class="collapsed" role="button" aria-expanded="false" aria-controls="order-cart-section">{{$count}} products in Cart</a>
                    </h4>

                    <div class="collapse" id="order-cart-section">
                        <table class="table table-mini-cart">
                            <tbody>
                            @if($cart !=null)
                                @php
                                    $total=0;
                                @endphp
                            @foreach($cart as $item)
                            <tr>
                                <td class="product-col">
                                    <figure class="product-image-container">
                                        <a href="{{route('product.details',$item['product_id'])}}" class="product-image">
                                            <img src="{{$item['image']}}" alt="product">
                                        </a>
                                    </figure>
                                    <div>
                                        <h2 class="product-title">
                                            <a href="{{route('product.details',$item['product_id'])}}">{{$item['name']}}</a>
                                        </h2>

                                        <span class="product-qty">Qty: {{$item['quantity']}}</span>
                                    </div>
                                </td>
                                <td class="price-col">{{$item['price']*$item['quantity']}}/-</td>
                            </tr>
                                @php
                                        $total += $item['price']*$item['quantity'];
                                        @endphp
                            @endforeach

                                <tr>
                                    <td>Total</td>
                                    <td>{{$total}}/-</td>
                                </tr>
                            @endif

                            </tbody>
                        </table>
                    </div><!-- End #order-cart-section -->
                </div><!-- End .order-summary -->
            </div><!-- End .col-lg-4 -->
        </div><!-- End .row -->

        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-steps-action">
                    <!--<a href="checkout-review.html" class="btn btn-primary float-right">NEXT</a>-->
                </div><!-- End .checkout-steps-action -->
            </div><!-- End .col-lg-8 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-6"></div><!-- margin -->

@endsection