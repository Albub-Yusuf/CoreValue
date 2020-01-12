<div class="col-6 col-md-4">
    <div class="product">
        <figure class="product-image-container">
            <a href="{{route('product.details',$product->id)}}" class="product-image">
                <img style="max-height: 250px; min-height: 250px;" src="{{asset(isset($product->product_image[0])?$product->product_image[0]->file_path:'images/no_image.png')}}" alt="product">
            </a>
            <a href="ajax/product-quick-view.html" class="btn-quickview">Quick View</a>
        </figure>
        <div class="product-details">
            <div class="ratings-container">
                <div class="">
                    <span class="" style="width:80%">{{$product->category->name}}</span><!-- End .ratings -->
                </div><!-- End .product-ratings -->
            </div><!-- End .product-container -->
            <h2 class="product-title">
                <a href="{{route('product.details',$product->id)}}">{{$product->name}}</a>
            </h2>
            <div class="price-box">
                <span class="product-price">BDT  {{$product->price}}</span>
            </div><!-- End .price-box -->

            <div class="product-action">
                <a href="{{route('product.details',$product->id)}}" class="paction add-cart" title="Add to Cart">
                    <span>Add to Cart</span>
                </a>
            </div><!-- End .product-action -->
        </div><!-- End .product-details -->
    </div><!-- End .product -->
</div><!-- End .col-md-4 -->