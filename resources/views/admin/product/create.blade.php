@extends('layouts.master')
@section('mainContent')

    <div class="row">
        <div class="col-lg-8 offset-2">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="text-center">{{$title}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="row">

                            <div class="col-md-6">

                                <label class="text-dark font-weight-medium" for="category_id">Select Category</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-notice"></i>
                                                        </span>
                                    </div>
                                <!-- <input type="text" name="name" value="{{old('name')}}"  class="form-control" required placeholder="Enter Product Name" aria-label="name">-->
                                    <select class="form-control" name="category_id" id="category_id">
                                        @php
                                            if(old('category_id')){
                                                $category_id = old('category_id');
                                            }elseif(isset($product)){
                                                $category_id = $product->category_id;
                                            }else{
                                                $category_id = null;
                                            }
                                        @endphp
                                        <option value="">Select Category</option>
                                        @foreach($categories as $id=> $category)
                                            <option @if($category_id == $id) selected @endif value="{{$id}}">{{$category}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">

                                @php
                                    if(old("brand_id")){
                                    $brand_id = old('brand_id');
                                    }elseif(isset($brand)){
                                        $brand_id = $brand->id;
                                    }else{
                                        $brand_id = null;
                                    }
                                @endphp

                                <label class="text-dark font-weight-medium" for="brand_id">Select Brand</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-notice"></i>
                                                        </span>
                                    </div>
                                    <select class="form-control" name="brand_id" id="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $id=> $brand)
                                            <option @if($brand_id == $id) selected @endif value="{{$id}}">{{$brand}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        </div>


                        <label class="text-dark font-weight-medium" for="">Product Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-notice"></i>
                                                        </span>
                            </div>
                            <input type="text" required name="name"  value="{{old('name')}}" class="form-control" required placeholder="Enter Product Name" aria-label="name">
                        </div>


                        <label class="text-dark font-weight-medium" for="">Product Details</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-edit"></i>
                                                        </span>
                            </div>
                        <!-- <input type="text" name="details" value="{{old('details')}}"  class="form-control" placeholder="Enter Product details" aria-label="details">-->
                            <textarea name="description" required class="form-control" id="Product_description" cols="80" rows="5">{{old('description')}}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium" for="">Color</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-pen"></i>
                                                        </span>
                                    </div>
                                    <input type="text" name="color" value="{{old('color')}}"  class="form-control" required placeholder="Enter Product Color" aria-label="color">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-dark font-weight-medium" for="">Size</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-pen"></i>
                                                        </span>
                                    </div>
                                    <input type="text" name="size" value="{{old('size')}}"  class="form-control" required placeholder="Enter Product Size" aria-label="size">
                                </div>

                            </div>
                        </div>

                       <div class="row">
                           <div class="col-md-6">
                               <label class="text-dark font-weight-medium" for="">Price</label>
                               <div class="input-group mb-2">
                                   <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-pen"></i>
                                                        </span>
                                   </div>
                                   <input type="number" step=".03" name="price" value="{{old('price')}}"  class="form-control" required placeholder="Enter Product price" aria-label="price">
                               </div>

                           </div>

                           <div class="col-md-6">
                               <label class="text-dark font-weight-medium" for="">Stock</label>
                               <div class="input-group mb-2">
                                   <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-pen"></i>
                                                        </span>
                                   </div>
                                   <input type="number" name="stock" value="{{old('stock')}}"  class="form-control" required placeholder="Enter Product Stock" aria-label="stock">
                               </div>
                           </div>
                       </div>

                        <label class="text-dark mb-2 mt-4 font-weight-medium d-inline-block mr-3" for="status">Status</label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                @php
                                    if(old("status")){
                                         $status = old('status');
                                     }elseif(isset($Product_data)){

                                     $status = $Product_data->status;
                                 }else{
                                     $status = null;
                             }@endphp
                                <label for="active" class="control control-radio">Active
                                    <input type="radio" id="active" value="active" @if($status == 'active') checked @endif name="status" checked="checked" />
                                    <div class="control-indicator"></div>
                                </label>
                            </li>
                            <li class="d-inline-block mr-3">
                                <label for="inactive" class="control control-radio">Inactive
                                    <input type="radio" id="inactive" value="inactive" @if($status == 'inactive') checked @endif name="status" />
                                    <div class="control-indicator"></div>
                                </label>
                            </li>
                        </ul>

                        <div class="col-md-12">
                            <label class="text-dark font-weight-medium" for="image">Image</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-image"></i>
                                                        </span>

                                </div>
                                <input type="file" class="form-control" name="images[]" id="image" multiple>
                            </div>
                        </div>




                        <div class="form-footer pt-5 border-top text-center">
                            <button type="submit" class="btn btn-primary btn-default">Create Product</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection