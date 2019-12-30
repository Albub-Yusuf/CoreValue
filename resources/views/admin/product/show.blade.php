@extends('layouts.master')
@section('mainContent')

    <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8 offset-2">
            <div class="text-center"><h3>{{$title}}</h3></div>
            <table class="table table-responsive-sm table-bordered table-striped">
                <tr>
                    <th scope="col">Product ID</th>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$product->category->name}}</td>
                </tr>
                <tr>
                    <th>Brand</th>
                    <td>{{$product->brand->name}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$product->price.'BDT'}}</td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td>{{$product->color}}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>{{$product->size}}</td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td>{{$product->stock}}</td>
                </tr>
                <tr>
                    <th>Product Status</th>
                    <td>{{ucfirst($product->status)}}</td>
                </tr>
                <tr>
                    <th>Product Details</th>
                    <td>{{$product->description}}</td>
                </tr>
                <tr>
                    <th>Images</th>
                    <td>
                        @if(count($product->product_image))
                                @foreach($product->product_image as $image)
                                <img src="{{URL::asset($image->file_path)}}" alt="" width="25%">
                                @endforeach
                        @endif
                    </td>
                </tr>
            </table>

            <a  class="btn btn-info" href="{{route('product.index')}}">Back</a>
        </div>
    </div>



@endsection