@extends('layouts.master', ['currentPage' => 'list'])
@section('page-title', 'LIST OF ACCOUNTS')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center" style="font-size: 30px;">LIST OF ACCOUNTS</h1>
        </div>
    </div>
    <div class="panel-body">
        @if(session()->has('message'))
            <div class="alert alert-success hidden">
            </div>
        @endif
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th style="text-align: center">Username</th>
                <th style="text-align: center">Password</th>
                <th style="text-align: center">Full Name</th>
                <th style="text-align: center">Gender</th>
                <th style="text-align: center">Email</th>
                <th style="text-align: center">Address</th>
                <th style="text-align: center">DOB</th>
                <th style="text-align: center">Phone</th>
                <th style="text-align: center">Tool</th>
            </tr>
            </thead>
            <tbody>
            @foreach($obj as $item)
                <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                    <td style="text-align: center">{{$item->username}}</td>
                    <td style="text-align: center">{{$item -> password}}</td>
                    <td style="text-align: center">{{$item -> full_name}}</td>
                    <td style="text-align: center">{{$item -> gender}}</td>
                    <td style="text-align: center">{{$item -> email}}</td>
                    <td style="text-align: center">{{$item -> address}}</td>
                    <td style="text-align: center">{{$item -> DOB}}</td>
                    <td style="text-align: center">{{$item -> phone}}</td>
                    <td style="text-align: center">
                        <a href="/admin/account/{{$item ->id}}/edit" class="fa fa-edit btn-edit mr-2"> Edit</a>
                        <a href="#" class="fa fa-edit btn-quick-edit mr-2"> Quick Edit</a>
                        <a href="#" id="{{$item ->id}}" class="fa fa-trash mr-2"> Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--Quick Edit Modal--}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="quick_edit_form" method="post" action="/admin/quickUpdate/account"
                          enctype="multipart/form-data">
                        @method('PUT')
                        {{csrf_field()}}
                        <input type="hidden" name="quick-update-id">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input class="form-control" type="file" name="image" id="add_images">
                        </div>
                        <div class="preview_images form-group">
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="btn-update">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Quick Edit Modal--}}

    <script src="{{asset('/js/account_list.js')}}"></script>
@endsection