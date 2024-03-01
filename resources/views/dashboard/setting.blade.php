@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('dashboard')}}</a>
        </li>
        <li class="breadcrumb-item active">{{__('dashboard')}}</li>


    </ol>

    <div class="container-fluid">

        @if(session('success'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible fade show text-left">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                    <strong> {{session('success')}}</strong>
                </div>
            </div>
        @endif
        <div class="animated fadeIn">
            <form action="{{route('admin.setting.update',['setting'=>$setting])}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('settings') }}</strong>
                        </div>
                        <div class="card-block">
                            <div class="form-group col-md-6">
                                <label>{{ __('logo')}}</label>
                                <img src="{{asset('storage/'.$setting->logo)}}" alt="" style="height: 50px">
                            </div>
                            <div class="form-group col-md-6">
                                <label>{{ __('favicon') }}</label>
                                <img src="{{asset('storage/'.$setting->favicon)}}" alt="" style="height: 50px">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label>{{ __('logo') }}</label>
                                    <input type="file" name="logo" class="form-control" placeholder="Enter Email..">
                                </div>
                                @error('logo')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label>{{ __('favicon') }}</label>
                                    <input type="file" name="favicon" class="form-control"
                                           placeholder="{{ __('favicon') }}">
                                </div>
                                @error('favicon')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label for="facebook">{{ __('facebook') }}</label>
                                    <input type="text" id="facebook" name="facebook" class="form-control"
                                           placeholder="{{ __('facebook') }}" value="{{old("facebook",$setting->facebook)}}">
                                </div>
                                @error('facebook')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label for="linkedin">{{ __('linkedin') }}</label>
                                    <input type="text" name="linkedin" id="linkedin" class="form-control"
                                           placeholder="{{ __('linkedin') }}" value="{{old("linkedin",$setting->linkedin)}}">
                                </div>
                                @error('linkedin')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label for="phone">{{ __('phone') }}</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           placeholder="{{ __('phone') }}" value="{{old('phone',$setting->phone)}}">
                                </div>
                                @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-label-group">
                                    <label for="email">{{ __('email') }}</label>
                                    <input type="text" id="email" name="email" class="form-control"
                                           placeholder="{{ __('email') }}" value="{{old('email',$setting->email)}}">
                                </div>
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                               id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                               aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                             id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <div class="form-label-group">
                                                <label for="{{$key}}[title]">{{ __('email') }} - {{ $lang }}</label>
                                                <input type="text" id="{{$key}}[title]" name="{{$key}}[title]" class="form-control"
                                                       placeholder="{{ __('email') }}"
                                                       value="{{old($key . '[title]', $setting->translate($key)->title)}}">
                                                </div>
                                                @error("$key.title")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <label for="{{$key}}[content]">{{ __('content') }}</label>
                                                <textarea name="{{$key}}[content]" id="{{$key}}[content]" class="form-control" cols="30"
                                                          rows="10">{{old($key . '[content]',$setting->translate($key)->content)}}</textarea>
                                                </div>
                                                @error("$key.content")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="form-group col-md-12">
                                                <div class="form-label-group">
                                                <label for="{{$key}}[address]">{{ __('address') }}</label>
                                                <input type="text" id="{{$key}}[address]" name="{{$key}}[address]" class="form-control"
                                                       value="{{old($key . '[address]',$setting->translate($key)->address)}}">
                                                </div>
                                                @error("$key.address")
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach

                                </div>


                            </div>


                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                    {{__('update')}}</button>
                                <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                    {{__('cancel')}}</button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
