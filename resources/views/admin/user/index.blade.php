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
                            {{$user->id}}
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

                        <a  class="btn" href="{{route('user.edit',$user->id)}}"><span class="mdi mdi-square-edit-outline">Edit</span></a>
                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" value="{{$user->file}}">
                            <button  onclick="return confirm('Wanna Delete the record?')" type="submit" class="btn" style=" display: inline-block;"><span style="color:red;" class="mdi mdi-delete"></span>Delete</button>
                        </form>



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