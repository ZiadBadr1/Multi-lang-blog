@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('blogs')}}</a></li>


    </ol>

    <div class="container-fluid">

        @include('partials.alert')
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('blogs')}}
                    <div class="text-md-right">
                        <a href="{{route('admin.blog.create')}}" class="edit btn btn-primary">{{__('create_new_blog')}}</a>
                    </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped" id="table_id">
                            <thead>
                            <tr>
                                <th>{{__('image')}}</th>
                                <th>{{__('title')}}</th>
                                <th>{{__('content')}}</th>
                                <th>{{__('parent')}}</th>
                                <th>{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                <td> <img class="img-fluid" style="width: 50px;" src="{{$blog->image()}}"
                                          alt="Card image cap"></td>
                                <td> {{$blog->translate(app()->getLocale())->title}}</td>
                                <td> {{$blog->translate(app()->getLocale())->content}}</td>
                                <td>
{{--                                    {{$blog->category->translate(app()->getLocale())->title}}--}}
                                </td>
                                    <td class="align-middle text-right">
                                        @if(auth()->user()->id === $blog->user_id)
                                        <div style="display: inline-block;">
                                            <a href="{{route('admin.blog.edit',$blog)}}"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div style="display: inline-block;">
                                            <form method="POST" action="{{route('admin.blog.destroy',$blog)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="edit btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    {!! $blogs->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
