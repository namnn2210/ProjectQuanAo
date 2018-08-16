@extends('layouts.master', ['currentPage' => 'addImages'])
@section('page-title', 'Add images')
@section('content')
    <form action="/admin/product/addImage" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="productId" value="{{$productId}}">
        <input type="file" name="images">
        <div>
            <input type="submit" value="Save">
            <input type="reset" value="Reset">
        </div>
    </form>
@endsection