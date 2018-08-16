@extends('layouts.master', ['currentPage' => 'create'])
@section('page-title', 'Create new product')
@section('content')
    <form action="/admin/product" method="post" enctype="multipart/form-data" name="create-product-form">
        {{csrf_field()}}
        <div>
            <label>Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description">
        </div>
        <div>
            <label>CategoryId</label>
            <input type="number" name="categoryId">
        </div>
        <div>
            <label>Image</label>
            <a href="#" id="upload_widget_opener">Upload multiple images</a>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price">
        </div>
        <div>
            <label>BrandId</label>
            <input type="number" name="brandId">
        </div>
        <div>
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </div>
    </form>
    <script src="//widget.cloudinary.com/global/all.js" type="text/javascript"></script>

    <script type="text/javascript">
        document.getElementById("upload_widget_opener").addEventListener("click", function() {
            var productName = $('form[name="create-product-form"] input[name="name"]').val();
            cloudinary.openUploadWidget({
                    cloud_name: 'dncvywdxi',
                    upload_preset: 'x5fnk2j5',
                    sources: [ 'local', 'url'],
                    folder: productName
                },
                function(error, result) { console.log(error, result) });
        }, false);
    </script>
@endsection