@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item">{{ __('users') }}        </li>
        <li class="breadcrumb-item active">{{ __('create_new_user') }}</li>
    </ol>


    <div class="container-fluid">
        @include('partials.alert')

        <div class="animated fadeIn">
            <form action="{{route('admin.users.store')}}" method="post">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('users') }}</strong>
                        </div>
                        <div class="card-block">
                            <div class="form-group col-md-12">
                                <label for="name">{{ __('name') }}</label>
                                <input type="text" id="name" name="name" class="form-control"
                                       placeholder="{{ __('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">{{ __('email') }}</label>
                                <input type="text" id="email" name="email" class="form-control"
                                       placeholder="{{ __('email') }}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="type">{{ __('role') }}</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="" selected></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('type')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="form-group col-md-12">
                                <label for="status">{{ __('status') }}</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" selected></option>
                                    <option value="1">Active</option>
                                    <option value="0">Not Active</option>
                                </select>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="password">{{ __('password') }}</label>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="{{ __('password') }}">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                {{__('create')}}</button>

                        </div>

                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
