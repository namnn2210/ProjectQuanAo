@extends('layouts.master', ['currentPage' => 'create'])
@section('page-title', 'Create new product')
@section('content')
    <form action="/admin/product" method="post" enctype="multipart/form-data">
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
@endsection