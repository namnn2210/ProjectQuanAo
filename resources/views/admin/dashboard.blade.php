@extends('layouts.new-master',['currentPage' => 'dashboard'])
@section('page-title', 'Trang chủ')
@section('active-dashboard','active')
@section('content')
    <div class="row" style="margin-bottom: 30px;">
        <div class="col-md-3">
            <label>Thời gian của biểu đồ:</label>
        </div>
        <div id="reportrange"
             style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; border-radius: 3px;"
             class="col-md-2">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-chart text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category">Số sản phẩm mới trong tháng</p>
                                <h4 class="card-title" id="count-products"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/product">Vào đây</a> để xem tất cả sản phẩm
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-light-3 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category">Tổng doanh thu trong tháng</p>
                                <h4 class="card-title" id="revenue"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/order">Vào đây</a> để xem tất cả đơn hàng
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-vector text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category">Số đơn hàng mới trong ngày</p>
                                <h4 class="card-title" id="count-orders"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/new-orders">Vào đây</a> để xem đơn hàng mới
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-favourite-28 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="numbers">
                                <p class="card-category">Số người đăng kí mới</p>
                                <h4 class="card-title" id="count-subscribers"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/subcriber">Vào đây</a> để gửi mail quảng cáo
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 card">
            <div class="card-header">
                <h3>Biểu đồ doanh thu theo thời gian</h3>
                <p>tính theo đơn vị (vnd)</p>
            </div>
            <div class="card-body">
                <div id="linechart_material"></div>
            </div>
        </div>

        <div class="col-md-6 card">
            <div class="card-header">
                <h3>Biểu đồ số sản phẩm bán theo danh mục</h3>
                <p>tính theo đơn vị (đơn hàng)</p>
            </div>
            <div class="card-body">
                <div id="piechart"></div>
            </div>
        </div>

        <div class="col-md-9 card">
            <div class="card-header">
                <h3>Biểu đồ số sản phẩm bán theo khung giờ</h3>
                <p>tính theo đơn vị (sản phẩm)</p>
            </div>
            <div class="card-body">
                <div id="columnchart"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="{{asset('js/dashboard_script.js')}}"></script>


@endsection