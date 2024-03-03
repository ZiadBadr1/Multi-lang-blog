@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item">{{ __('categories') }}</li>
        <li class="breadcrumb-item active">{{ __('category') }}</li>


    </ol>


    <div class="container-fluid">
        @include('partials.alert')
        <div class="animated fadeIn">
            <form action="{{ Route('admin.category.update',$category) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('users') }}</strong>
                        </div>
                        <div class="card-block">

                            <div class="form-group col-md-12">
                                <label>{{ __('image') }}</label>
                                <input type="file" name="image" class="form-control" placeholder="{{ __('image') }}">
                                @error('image')
                                <p class="text-danger"> {{$message}} </p>
                                @enderror
                                <img src="{{asset($category->image())}}" alt="" height="80px;" style="margin-top: 10px">

                            </div>


                            <div class="form-group col-md-12">
                                <label for="parent_id">{{ __('status') }}</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="">قسم رئيسي</option>
                                    @foreach ($categories as $c)
                                        <option value="{{$c->id}}" @selected($category->parent_id == $c->id)>{{$c->translate("ar")->title}}</option>
                                    @endforeach
                                </select>
                                @error('parent_id')
                                <p class="text-danger"> {{$message}} </p>
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
                                                <label for="{{$key}}[title]">{{ __('title') }} - {{ $lang }}</label>
                                                <input type="text" id="{{$key}}[title]" name="{{$key}}[title]"
                                                       class="form-control"
                                                       placeholder="{{ __('title') }}" value="{{old("$key.title",$category->translate($key)->title)}}">
                                                @error("$key.title")
                                                <p class="text-danger"> {{$message}} </p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="{{$key}}[content]">{{ __('content') }}</label>
                                                <textarea name="{{$key}}[content]" id="{{$key}}[content]"
                                                          class="form-control" cols="30"
                                                          rows="10">{{old("$key.content",$category->translate($key)->content)}}</textarea>
                                                @error("$key.content")
                                                <p class="text-danger"> {{$message}} </p>
                                                @enderror
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                Submit
                            </button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>
                                Reset
                            </button>
                        </div>

                    </div>


                </div>
            </form>
        </div>
    </div>
@endsection
