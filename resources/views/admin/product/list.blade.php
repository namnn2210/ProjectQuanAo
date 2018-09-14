@extends('layouts.new-master', ['currentPage' => 'list'])
@section('page-title', 'Danh sách sản phẩm')
@section('active-product','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <div class="panel-body">
        @if(session()->has('message'))
            <div class="alert alert-success hidden">
            </div>
        @endif
        <table width="100%" class="table table-hover" id="dataTables-example" style="background-color: white">
            <thead>
            <tr>
                <th style="text-align: center">Ảnh sản phẩm</th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Danh mục</th>
                <th style="text-align: center">Nhãn hàng</th>
                <th style="text-align: center">Giá</th>
                <th style="text-align: center">Mô tả</th>
                <th style="text-align: center">Trạng thái</th>
                <th style="text-align: center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($obj as $item)
                <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                    <td style="text-align: center">
                        <img src="<?php echo explode("&", $item->images, -1)[0];?>" style="max-height: 30%">
                    </td>
                    <td style="text-align: center">{{$item -> name}}</td>
                    <td style="text-align: center">{{$item -> category -> name}}</td>
                    <td style="text-align: center">{{$item -> brand -> name}}</td>
                    <td style="text-align: center">{{number_format($item -> price,0)}} VND</td>
                    <td>{{$item -> description}}</td>
                    <td style="text-align: center">
                        @if($item->status==1)
                            <div class="active-banner">
                                Hoạt động
                            </div>
                        @endif
                    </td>
                    <td class="black-icon" style="text-align: center">
                        <a href="#" class="fa fa-pencil btn-quick-edit mr-2"></a>
                        <a href="#" id="{{$item -> id}}" class="fa fa-trash mr-2"></a>
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
                    <h1 class="modal-title" id="exampleModalLabel">Chỉnh sửa sản phẩm</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="quick_edit_form" method="post" action="/admin/quickUpdate/product"
                          enctype="multipart/form-data">
                        @method('PUT')
                        {{csrf_field()}}
                        <input type="hidden" name="quick-update-id">
                        <input type="hidden" name="remain-images">
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control" type="text" name="name">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <input class="form-control" type="number" name="price">
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select class="form-control" name="category_id">
                                @foreach($obj_category as $item)
                                    <option value="{{$item -> id}}" name="product_category">{{$item -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nhãn hàng</label>
                            <select class="form-control" name="brand_id">
                                @foreach($obj_brand as $item)
                                    <option value="{{$item->id}}">{{$item -> name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh sản phẩm</label>
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