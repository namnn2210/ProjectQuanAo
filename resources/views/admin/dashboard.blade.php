@extends('layouts.master',['currentPage' => 'dashboard'])
@section('page-title', 'Trang chủ')
@section('active-dashboard','active')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{$count}}</h3>
                    <p>Đơn hàng mới</p>
                </div>
                <a href="/admin/new-orders" class="small-box-footer">
                    Xem thông tin chi tiết
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="linechart_material"></div>
        </div>
    </div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['line']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url:'/admin/chart',
                method:'GET',
                success:function (resp) {
                    drawChart(resp);
                },
                error: function () {
                    swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                }
            });
        });

        function drawChart(chart_data) {
            var data = new google.visualization.DataTable();
            data.addColumn('date', 'Ngày');
            data.addColumn('number', 'Doanh thu');
            for (var i = 0; i < chart_data.length; i++){
                data.addRow([new Date(chart_data[i].day),  Number(chart_data[i].revenue)]);
            }
            var options = {
                chart: {
                    title: 'Biểu đồ doanh thu theo thời gian',
                    subtitle: 'tính theo đơn vị (vnd)'
                },
                height: 600,
                hAxis: {
                    format: 'dd/MM/yyyy'
                }
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }
    </script>
@endsection