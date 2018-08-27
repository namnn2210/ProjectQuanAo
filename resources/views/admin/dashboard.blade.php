@extends('layouts.master',['currentPage' => 'dashboard'])
@section('page-title', 'Trang chủ')
@section('active-dashboard','active')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3></h3>
                    <p>Đơn hàng mới</p>
                </div>
                <a href="#" class="small-box-footer">
                    Xem thông tin chi tiết
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <script src="{{asset('js/dashboard_script.js')}}"></script>
@endsection