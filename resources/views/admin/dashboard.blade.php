@extends('layouts.new-master',['currentPage' => 'dashboard'])
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
    <div id="reportrange" style="cursor: pointer; float: right;">
        <i class="fa fa-calendar"></i>&nbsp;
        <span></span> <i class="fa fa-caret-down"></i>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-7 card">
            <div class="card-header">
                <h3>Biểu đồ doanh thu theo thời gian</h3>
                <p>tính theo đơn vị (vnd)</p>
            </div>
            <div class="card-body">
                <div id="linechart_material"></div>
            </div>
        </div>

        <div class="col-md-4 card">
            <div class="card-header">
                <h3>Biểu đồ số sản phẩm bán theo danh mục</h3>
                <p>tính theo đơn vị (đơn hàng)</p>
            </div>
            <div class="card-body">
                <div id="piechart"></div>
            </div>
        </div>
    </div>
    <!--Script LineChart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages': ['line']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url: '/admin/chart',
                method: 'GET',
                success: function (resp) {
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
            for (var i = 0; i < chart_data.length; i++) {
                data.addRow([new Date(chart_data[i].day), Number(chart_data[i].revenue)]);
            }
            var options = {
                // chart: {
                //     title: 'Biểu đồ doanh thu theo thời gian',
                //     subtitle: 'tính theo đơn vị (vnd)'
                // },
                height: 400,
                hAxis: {
                    format: 'dd/MM/yyyy'
                }
            };

            var chart = new google.charts.Line(document.getElementById('linechart_material'));

            chart.draw(data, google.charts.Line.convertOptions(options));
        }

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(function () {
            $.ajax({
                url: 'admin/chart-1',
                method: 'GET',
                success: function (resp) {
                    drawChart_1(resp);
                },
                error: function () {
                    swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                }

            });
        });

        function drawChart_1(chart_data) {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['', 0],
                ['', null],
            ]);
            for (var i = 0; i < chart_data.length; i++) {
                data.addRow([chart_data[i].category, Number(chart_data[i].quantity)]);
            }
            var options = {
                height: 400,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        $(function() {
            var start = moment().subtract(29, 'days');
            var end = moment();

            function cb(start, end) {
                $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));
            }

            $('#reportrange').daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    'Hôm nay': [moment(), moment()],
                    'Hôm qua': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    '7 ngày trước': [moment().subtract(6, 'days'), moment()],
                    '30 ngày trước': [moment().subtract(29, 'days'), moment()],
                    'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                    'Tháng trước': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Áp dụng",
                    "cancelLabel": "Hủy",
                    "fromLabel": "Từ",
                    "toLabel": "Đến",
                    "customRangeLabel": "Tùy chọn",
                    "daysOfWeek": [
                        "CN",
                        "T2",
                        "T3",
                        "T4",
                        "T5",
                        "T6",
                        "T7"
                    ],
                    "monthNames": [
                        "Tháng 1",
                        "Tháng 2",
                        "Tháng 3",
                        "Tháng 4",
                        "Tháng 5",
                        "Tháng 6",
                        "Tháng 7",
                        "Tháng 8",
                        "Tháng 9",
                        "Tháng 10",
                        "Tháng 11",
                        "Tháng 12"
                    ],
                    "firstDay": 1
                }
            }, cb);
            cb(start, end);
            $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
                //do something, like clearing an input
                $('#reportrange').val('');
            });
            $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
                // console.log();
                // console.log(picker.endDate.format('YYYY-MM-DD'));
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/admin/chart?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal('Không có dữ liệu', 'Vui lòng lựa chọn khoảng thời gian khác.', 'warning');
                            return;
                        };
                        drawChart(resp);
                    },
                    error: function () {
                        swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                });

                $.ajax({
                    url: '/admin/chart-1?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if(resp.length ==0){
                            swal('Không có dữ liệu', 'Vui lòng lựa chọn khoảng thời gian khác.', 'warning');
                            return;
                        };
                        drawChart_1(resp);
                    },
                    error: function () {
                        swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                });
            });

        });
    </script>

    <!--Script PieChart -->
    {{--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
    <script type="text/javascript">

    </script>

@endsection