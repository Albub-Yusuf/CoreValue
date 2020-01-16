@extends('layouts.master')
@section('mainContent')



    <div class="row">
        <div class="col-lg-8 offset-2">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h3 class="text-center">{{$title}}</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('brand.update',$brandInfo->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')


                        <label class="text-dark font-weight-medium" for="">Brand Name</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-notice"></i>
                                                        </span>
                            </div>
                            <input type="text" name="name" value="{{$brandInfo->name}}"  class="form-control" placeholder="Enter Product Name" aria-label="name">
                        </div>

                        <label class="text-dark font-weight-medium" for="">Brand Details</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-edit"></i>
                                                        </span>
                            </div>
                        <!-- <input type="text" name="details" value="{{old('details')}}"  class="form-control" placeholder="Enter Brand details" aria-label="details">-->
                            <textarea name="details" required class="form-control" id="brand_details" cols="80" rows="5">{{$brandInfo->details}}</textarea>
                        </div>


                        <label class="text-dark mb-2 mt-4 font-weight-medium d-inline-block mr-3" for="status">Status</label>
                        <ul class="list-unstyled list-inline">
                            <li class="d-inline-block mr-3">
                                @php
                                    if(old("status")){
                                         $status = old('status');
                                     }elseif(isset($brandInfo)){

                                     $status = $brandInfo->status;
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
                            <label class="text-dark font-weight-medium" for="logo">Brand Logo</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-image"></i>
                                                        </span>

                                </div>
                                <input type="file" class="form-control" name="logo" id="logo" multiple>
                            </div>

                            @if(($brandInfo->logo)!=null)
                            <img src="{{asset($brandInfo->logo)}}"  width="25%" alt="logo image">
                            @endif

                        </div>

                        <div class="form-footer pt-5 border-top text-center">
                            <button type="submit" class="btn btn-primary btn-default">Update brand</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection