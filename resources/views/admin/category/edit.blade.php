@extends('layouts.master',['currentPage' => 'edit'])
@section('page-title', 'EDIT CATEGORY')
@section('active-category','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT CATEGORY</h1>
        </div>
    </div>
    <div class="panel-body">
        <div class="col-lg-6 col-md-offset-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(session()->has('message'))
                <div class="alert alert-success hidden">
                    {{--{{ session()->get('message') }}--}}
                </div>
            @endif
            <form action="/admin/category/{{$obj -> id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$obj->name}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5">{{$obj->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input class="form-control" type="file" name="image" id="add_images">
                </div>
                <div class="preview_images">
                    <img src="{{$obj->image}}"/>
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <button type="reset" class="btn btn-primary btn-block">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('/js/category_list.js')}}"></script>
@endsection