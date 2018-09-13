@extends('layouts.new-master', ['currentPage' => 'create'])
@section('page-title', 'THÊM NHÃN HIỆU MỚI')
@section('active-brand','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">THÊM NHÃN HIỆU MỚI</h1>
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
            <form action="/admin/brand" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Tên nhãn hiệu</label>
                    <input type="text" class="form-control" name="name">
                    <p class="alert-danger" style="margin-top: 1%"></p>
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" name="description" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label>Quốc gia</label>
                        <input type="text" class="form-control" name="country">
                        <p class="alert-danger" style="margin-top: 1%"></p>
                    </div>
                    <label>Hình ảnh</label>
                    <input class="form-control" type="file" name="image" id="add_images">
                </div>
                <div class="preview_images hidden"></div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
                    <button type="reset" class="btn btn-primary btn-block">Đặt lại</button>
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
                $('.preview_images').removeClass("hidden");
                imagesPreview(this, 'div.preview_images');
            });
            $(":reset").click(function (){
                $(".preview_images").addClass('hidden');
                $(".preview_image").remove();
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
                    title: 'Saved Sucess',
                    text: 'Brand information saved into dababase',
                    type: 'success',
                    allowOutsideClick: true,
                    html: true
                },
                function (isConfirm) {
                    if (isConfirm) {
                        window.location.href = '/admin/brand';
                    }
                });
        }
    </script>
@endsection