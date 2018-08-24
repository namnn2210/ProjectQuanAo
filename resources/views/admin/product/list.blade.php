@extends('layouts.master', ['currentPage' => 'list'])
@section('page-title', 'LIST PRODUCTS')
@section('active-product','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">LIST PRODUCTS</h1>
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
                <th style="text-align: center">Thumnail</th>
                <th style="text-align: center">Name</th>
                <th style="text-align: center">Category</th>
                <th style="text-align: center">Brand</th>
                <th style="text-align: center">Price</th>
                <th style="text-align: center">Description</th>
                <th style="text-align: center">Status</th>
                <th style="text-align: center">Tool</th>
            </tr>
            </thead>
            <tbody>
                @foreach($obj as $item)
                    <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                        <td style="text-align: center">
                            <img src="<?php echo explode("&",$item -> images,-1)[0];?>" style="max-height: 30%">
                        </td>
                        <td style="text-align: center">{{$item -> name}}</td>
                        <td style="text-align: center">{{$item -> category -> name}}</td>
                        <td style="text-align: center">{{$item -> brand -> name}}</td>
                        <td style="text-align: center">{{$item -> price}}</td>
                        <td>{{$item -> description}}</td>
                        <td style="text-align: center">{{$item -> status}}</td>
                        <td style="text-align: center">
                            <a href="#" class="fa fa-edit btn-quick-edit mr-2">Edit</a>
                            <a href="#" id="{{$item -> id}}" class="fa fa-trash mr-2"> Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{--Quick Edit Modal--}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Edit Product</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="quick_edit_form" method="post" action="/admin/quickUpdate/product" enctype="multipart/form-data">
                        @method('PUT')
                        {{csrf_field()}}
                        <input type="hidden" name="quick-update-id">
                        <input type="hidden" name="remain-images">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input class="form-control" type="number" name="price">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category_id">
                                @foreach($obj_category as $item)
                                    <option value="{{$item -> id}}" name="product_category">{{$item -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select class="form-control" name="brand_id">
                                @foreach($obj_brand as $item)
                                    <option value="{{$item->id}}">{{$item -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Images</label>
                            <input class="form-control" type="file" multiple="multiple" name="images[]" id="add_images">
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

    <script src="{{asset('/js/list_js.js')}}"></script>
@endsection