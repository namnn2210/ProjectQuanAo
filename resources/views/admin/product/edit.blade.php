@extends('layouts.master',['currentPage' => 'edit'])
@section('page-title', 'EDIT PRODUCT')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT PRODUCT</h1>
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
            <form action="/admin/product/{{$obj -> id}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" value="{{$obj->name}}">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" class="form-control" name="price" value="{{$obj->price}}">
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="categoryId">
                        @foreach($obj_category as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
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
                    <textarea class="form-control" name="description" rows="5">{{$obj->description}}</textarea>
                </div>
                <div class="form-group">
                    <label>Images</label>
                    <input class="form-control" type="file" multiple="multiple" name="images[]" id="add_images">
                </div>
                <div class="preview_images">
                    <img src="<?php echo explode("&",$obj -> images,-1)[0];?>">
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    <button type="reset" class="btn btn-primary btn-block">Reset</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(function() {
            var imagesPreview = function(input, display_images) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $($.parseHTML('<img>')).attr('src', e.target.result).appendTo(display_images);
                            $("img").addClass("preview_image");
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#add_images').on('change', function() {
                $('.preview_images').empty();
                imagesPreview(this, 'div.preview_images');
            });
        });
        $('input').keyup(function(){
            var $th = $(this);
            $th.val( $th.val().replace(/[^a-zA-Z0-9-" "]/g, function(){
                $('p').text('Please only use number and text');
                return '';
            }));
        });
        if($(".alert-success")[0]){
            swal({
                    title: 'Edited',
                    text: 'Product information saved into dababase',
                    type: 'success',
                    allowOutsideClick: true,
                    html: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = '/admin/product';
                    }
                });
        }
    </script>
@endsection