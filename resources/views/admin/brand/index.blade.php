@extends('layouts.master')
@section('searchContent')
    <div class="input-group" style="width: 150%;">
        <button type="button" name="addbrand" id="add-btn" class="btn btn-flat">
            <!--i style="color:#1b4b72;" class="mdi mdi-magnify"></i>-->
            <a href="{{route('brand.create')}}"><span class="mdi mdi-table-plus text-sm-center"><h6>{{$title}}</h6></span></a>
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
            <div class="text-center"><h3>{{$title}}</h3></div>
            <table class="table table-responsive-sm table-bordered">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <th scope="row">{{$serial++}}</th>
                        <td>{{$brand->name}}</td>

                        <td>
                            <span class="mb-2 mr-2 badge badge-pill  @if($brand->status == 'active') badge-success @endif  @if($brand->status == 'inactive') badge-danger @endif">{{$brand->status}}</span>
                        </td>
                        <td class="text-center">@if($brand->deleted_at == null) <a class="btn btn-sm btn-secondary" href="{{route('brand.edit',$brand->id)}}"><span class="mdi mdi-square-edit-outline">Edit</span></a>@endif
                            @if($brand->deleted_at == null)
                                <form style="display: inline;" action="{{route('brand.destroy',$brand->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure want to delete this brand?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Delete</span></button>
                                </form>
                            @endif
                            @if($brand->deleted_at != null)
                                <form style="display: inline;" action="{{route('brand.restore',$brand->id)}}" method="post">
                                    @csrf
                                    @method('post')
                                    <button class="btn btn-sm btn-warning" onclick="return confirm('Do you want to restore this brand?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Restore</span></button>
                                </form>
                            @endif

                            @if($brand->deleted_at != null)
                                <form style="display: inline;" action="{{route('brand.delete',$brand->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to Delete this brand permanently?')"><span style="color:darkred;" class="mdi mdi-delete">Permanent Delete</span></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">

                <div class="pagination border-separted ">
                    {{$brands->render()}}
                </div>
            </div>
        </div>
    </div>

@endsection