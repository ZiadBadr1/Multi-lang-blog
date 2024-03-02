@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('users')}}</a></li>


    </ol>

    <div class="container-fluid">

        @include('partials.alert')
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('users')}}
                    <div class="text-md-right">
                        <a href="{{route('admin.users.create')}}" class="edit btn btn-primary">{{__('create_new_user')}}</a>
                    </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped" id="table_id">
                            <thead>
                            <tr>
                                <th>{{__('name')}}</th>
                                <th>{{__('email')}}</th>
                                <th>{{__('role')}}</th>
                                <th>{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if(auth()->user()->id != $user->id)
                                <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->type}}</td>
                                    <td class="align-middle text-right">
                                        <div style="display: inline-block;">
                                            <a href="{{route('admin.users.edit',$user)}}"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div style="display: inline-block;">
                                            <form method="POST" action="{{route('admin.users.destroy',$user)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="edit btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
