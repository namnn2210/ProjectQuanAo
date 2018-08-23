@extends('layouts.master',['currentPage' => 'edit'])
@section('page-title', 'EDIT ACCOUNT')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center" style="font-size: 30px;">EDIT ACCOUNT</h1>
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
            <form action="/admin/account/{{$obj -> id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{csrf_field()}}
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="{{$obj->username}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" value="{{$obj->password}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="full_name" value="{{$obj->full_name}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <p>Gender</p>
                    <p><input type="radio" id="1" name="gender" value="Male" style="max-width: 10%;">1. Male</p>
                    <p><input type="radio" id="2" name="gender" value="Female">2. Female</p>
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" value="{{$obj->email}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" value="{{$obj->address}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>DOB</label>
                    <input type="date" class="form-control" name="dob" value="{{$obj->DOB}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" value="{{$obj->phone}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <button type="reset" class="btn btn-primary btn-block">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('/js/account_list.js')}}"></script>
@endsection