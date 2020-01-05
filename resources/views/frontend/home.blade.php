@extends('layouts.frontend.master')
@section('product_content')

@foreach($products as $product)

            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="#">
                            <img class="" src="{{asset($product->product_image[0]->file_path)}}" alt="product image">
                            <!--<img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo5/images/img-2.jpg">-->
                        </a>
                        <ul class="social">
                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <!--<span class="product-new-label">New</span>
                        <span class="product-discount-label">-10%</span>
                        -->
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                        <div class="price">
                           BDT {{$product->price}}
                           <!-- <span>$16.00</span>-->
                        </div>
                        <a class="add-to-cart" href="#">ADD TO CART</a>
                    </div>
                </div>
            </div>
    @endforeach
@endsection