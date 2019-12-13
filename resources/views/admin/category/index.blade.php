@extends('layouts.master')
@section('searchContent')
            <div class="input-group" style="width: 150%;">
                <button type="button" name="addcategory" id="add-btn" class="btn btn-flat">
                    <!--i style="color:#1b4b72;" class="mdi mdi-magnify"></i>-->
                    <a href="{{route('category.create')}}"><span class="mdi mdi-table-plus text-sm-center"><h6>Add Category</h6></span></a>
                </button>
                <form style="display: inline-flex;">

                <input type="text" name="search" value="{{request()->search}}" id="search-input" class="form-control" placeholder="'search bar', 'chart' etc."
                      autofocus autocomplete="off" />

                    <select name="status" id="" class="form-control">
                        <option value="">Select Status</option>
                        <option @if(request()->status == 'active') selected @endif value="active">Active</option>
                        <option @if(request()->status == 'inactive')selected @endif value="inactive">Inactive</option>

                    </select>

                    <button type="submit"  id="search-btn" class="btn btn-flat">
                        <i style="color:#1b4b72;" class="mdi mdi-magnify"></i>
                    </button>
                </form>
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
                    <th scope="col" class="text-center">Action</th>
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
                    <td class="text-center">@if($category->deleted_at == null) <a class="btn btn-sm btn-secondary" href="{{route('category.edit',$category->id)}}"><span class="mdi mdi-square-edit-outline">Edit</span></a>@endif
                        @if($category->deleted_at == null)
                        <form style="display: inline;" action="{{route('category.destroy',$category->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure want to delete this category?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Delete</span></button>
                        </form>
                        @endif
                        @if($category->deleted_at != null)
                        <form style="display: inline;" action="{{route('category.restore',$category->id)}}" method="post">
                            @csrf
                            @method('post')
                           <button class="btn btn-sm btn-warning" onclick="return confirm('Do you want to restore this category?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Restore</span></button>
                        </form>
                        @endif

                        @if($category->deleted_at != null)
                            <form style="display: inline;" action="{{route('category.delete',$category->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to Delete this category permanently?')"><span style="color:darkred;" class="mdi mdi-delete">Permanent Delete</span></button>
                            </form>
                        @endif
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">

                <div class=" col-sm-12 col-md-6 col-lg-4 offset-5 pagination border-rounded ">
                    {{$categories->render()}}
                </div>
            </div>
        </div>






    </div>






@endsection