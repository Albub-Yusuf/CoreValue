@extends('layouts.master')
@section('mainContent')

<div class="row">
    <div class="col-lg-8 offset-2">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h3 class="text-center">{{$title}}</h3>
            </div>
            <div class="card-body">
                <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="form-group">
                        <label>Select Admin Type</label>
                        <select name="adminType" class="form-control" id="adminType">
                            <option value="">Choose Admin Type</option>
                            <option value="admin">Admin</option>
                            <option value="manager">Manager</option>
                        </select>
                    </div>

                    <label class="text-dark font-weight-medium" for="">Name</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-account"></i>
                                                        </span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Enter Admin's Name Here" aria-label="name">
                    </div>

                    <label class="text-dark mt-4 font-weight-medium" for="">Phone</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
													<span class="input-group-text">
														<i class="mdi mdi-phone"></i>
													</span>
                        </div>
                        <input type="text" name="phone" class="form-control"  placeholder="Enter Phone Number" aria-label="phone">
                    </div>

                    <label class="text-dark font-weight-medium" for="">Email</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-email"></i>
														</span>

                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email Address" aria-label="email">
                    </div>

                    <label class="text-dark font-weight-medium" for="">Password</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
														<span class="input-group-text">
															<i class="mdi mdi-lock"></i>
														</span>

                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password" aria-label="password">
                    </div>

                    <div class="form-group">
                        <label class="col-md-12">Image</label>
                        <div class="col-md-12">
                            @if(isset($post) && $post->file != null)

                                <img src="{{asset($post->file)}}" alt="image">
                            @endif
                                <input input name="file" type="file" class="form-control-file">
                            <!--<input name="file" type="file" placeholder="Upload File" class="form-control form-control-file"  >-->
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label class="col-md-8">Upload Image</label>
                        <input input name="file" type="file" class="form-control-file">
                    </div>
                    -->
                    <label class="text-dark mb-2 mt-4 font-weight-medium d-inline-block mr-3" for="status">Status</label>
                    <ul class="list-unstyled list-inline">
                        <li class="d-inline-block mr-3">
                            <label for="active" class="control control-radio">Active
                                <input type="radio" id="active" value="active" name="status" checked="checked" />
                                <div class="control-indicator"></div>
                            </label>
                        </li>
                        <li class="d-inline-block mr-3">
                            <label for="inactive" class="control control-radio">Inactive
                                <input type="radio" id="inactive" value="inactive" name="status" />
                                <div class="control-indicator"></div>
                            </label>
                        </li>
                    </ul>

                    <div class="form-footer pt-5 border-top text-center">
                        <button type="submit" class="btn btn-primary btn-default">Create Admin</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection