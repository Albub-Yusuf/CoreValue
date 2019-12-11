@extends('layouts.master')
@section('searchContent')
            <div class="input-group">
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <!--i style="color:#1b4b72;" class="mdi mdi-magnify"></i>-->
                    <a href="{{route('category.create')}}"><span class="mdi mdi-table-plus text-sm-center"><h6>Add Category</h6></span></a>
                </button>
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i style="color:#1b4b72;" class="mdi mdi-magnify"></i>
                </button>
                <input type="text" name="query" id="search-input" class="form-control" placeholder="'search bar', 'chart' etc."
                       autofocus autocomplete="off" />
            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div>

@endsection
@section('mainContent')

    <div class="row">

        <div class="col-sm-12 col-md-8 col-lg-8 offset-2">
            <div class="text-center"><h3>Category List</h3></div>
            <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->name}}</td>

                    <td>
                        <span class="mb-2 mr-2 badge badge-pill  @if($category->status == 'active') badge-success @endif  @if($category->status == 'inactive') badge-danger @endif">{{$category->status}}</span>
                    </td>
                    <td colspan="1">Edit | Delete</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>



    </div>






@endsection