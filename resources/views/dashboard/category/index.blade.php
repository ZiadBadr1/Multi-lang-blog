@extends('dashboard.layouts.master')

@section('content')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{__('dashboard')}}</li>
        <li class="breadcrumb-item"><a href="#">{{__('categories')}}</a></li>


    </ol>

    <div class="container-fluid">

        @include('partials.alert')
        <div class="animated fadeIn">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{__('categories')}}
                    <div class="text-md-right">
                        <a href="{{route('admin.category.create')}}" class="edit btn btn-primary">{{__('create_new_category')}}</a>
                    </div>
                    </div>
                    <div class="card-block">
                        <table class="table table-striped" id="table_id">
                            <thead>
                            <tr>
                                <th>{{__('image')}}</th>
                                <th>{{__('parent')}}</th>
                                <th>{{__('actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                <td> <img class="img-fluid" style="width: 50px;" src="{{$category->image()}}"
                                          alt="Card image cap"></td>
                                <td> @if(isset($category->parent)) {{$category->parent->translate("ar")->title}} @else {{__('primary')}}@endif</td>
                                    <td class="align-middle text-right">
                                        <div style="display: inline-block;">
                                            <a href="{{route('admin.category.edit',$category)}}"  class="edit btn btn-success btn-sm" ><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div style="display: inline-block;">
                                            <form method="POST" action="{{route('admin.category.destroy',$category)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="edit btn btn-danger btn-sm"> <i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
