@extends('layouts.master')
@section('mainContent')


    <div class="card card-table-border-none"  data-scroll-height="580">
        <div class="card-header justify-content-between ">
            <h3>{{$title}}</h3>
            <div>
                <button class="text-black-50 mr-2 font-size-20">
                    <i class="mdi mdi-cached"></i>
                </button>
                <div class="dropdown show d-inline-block widget-dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-customar"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-customar">
                        <li class="dropdown-item"><a  href="#">Action</a></li>
                        <li class="dropdown-item"><a  href="#">Another action</a></li>
                        <li class="dropdown-item"><a  href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body pt-0">
            <table class="table table-stripped table-responsive ">
                <tbody>
                @foreach($users as $user)
                    @if(($user->type == 'admin') || ($user->type == 'manager') )
                    @php
                        if($user->file == NULL){
                            $image = 'Backend/assets/img/user/placeholder.png';
                        }else{
                            $image = $user->file;
                        }

                    @endphp
                <tr>
                    <td >
                        <div class="media">
                           <div class="col-md-1">
                            {{$serial++}}
                        </div>

                            <div class="media-image mr-3 rounded-circle">
                                <a href="#"><img class="rounded-circle w-45" src="{{asset($image)}}" alt="admin image"></a>
                            </div>
                            <div class="media-body align-self-center col-lg-3">
                                <a href="#">{{$user->name}}</a><br>
                                <small>{{$user->email}}</small>

                            </div>
                            <div class="col-md-2">{{$user->type}}</div>
                            <div class="col-md-2">{{$user->phone}}</div>
                            <div class="col-md-2"><span @if($user->status == 'inactive')class="badge badge-danger"@endif class="badge badge-success">{{ucfirst($user->status)}}</span></div>
                            <div class="col-md-2">
                                @if($user->deleted_at == null) <a class="btn btn-sm btn-secondary" href="{{route('user.edit',$user->id)}}"><span class="mdi mdi-square-edit-outline">Edit</span></a>@endif
                                @if($user->deleted_at == null)
                                    <form style="display: inline;" action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure want to delete this user?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Delete</span></button>
                                    </form>
                                @endif
                                @if($user->deleted_at != null)
                                    <form style="display: inline;" action="{{route('user.restore',$user->id)}}" method="post">
                                        @csrf
                                        @method('post')
                                        <button class="btn btn-sm btn-warning" onclick="return confirm('Do you want to restore this user?')"><span style="color:whitesmoke;" class="mdi mdi-delete">Restore</span></button>
                                    </form>
                                @endif

                                @if($user->deleted_at != null)
                                    <form style="display: inline;" action="{{route('user.delete',$user->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Do you want to Delete this user permanently?')"><span style="color:darkred;" class="mdi mdi-delete">Permanent Delete</span></button>
                                    </form>
                                @endif
                                
                                
                                
                                
                                
                                
                        </div>
                        </div>
                    </td>

                </tr>
                    @endif
                @endforeach
                </tbody>
            </table>




        </div>


    </div>

    @endsection