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
            <li>
                <span>Shipping</span>
            </li>
            <li class="active">
                <span>Review &amp; Payments</span>
            </li>
        </ul>
        <div class="row">
            <div class="col-lg-8">
                <ul class="checkout-steps">
                    <li>
                        <h2 class="step-title">Customer Details</h2>

                    </li>
                    <li>
                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{$customer->first_name.' '.$customer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Shipping Address</th>
                                <td>{{$customer->street_address.' , '.$customer->district.'-'.$customer->zip}}</td>
                            </tr>
                            <tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$customer->phone }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$customer->email }}</td>
                            </tr>
                            </tr>
                            <tr>
                                <th>Order Number</th>
                                <td>{{$order->order_number }}</td>
                            </tr>
                            </tr>
                            <tr>
                                <th>Payable Amount</th>
                                <td>{{$order->total_price }}/-</td>
                            </tr>
                            </tr>
                        </table>
                        <button class="btn btn-success btn-bg">Pay Now</button>

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

                    <div  id="order-cart-section">
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
                                                    <img src="{{asset($item['image'])}}" alt="product">
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