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
                                <p class="card-category">Tổng số sản phẩm mới</p>
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
                                <p class="card-category">Tổng doanh thu</p>
                                <h4 class="card-title">1,345VND</h4>
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
                                <p class="card-category">Số đơn hàng mới</p>
                                <h4 class="card-title" id="count-orders"></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/new-orders">Vào đây</a> để xem các đơn hàng mới
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
                                <p class="card-category">Số người đăng kí</p>
                                <h4 class="card-title">+45K</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="/admin/subcriber">Vào đây</a> để gửi mail quảng cáo cho khách hàng
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
    </div>
    <!--Script LineChart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        // Lấy số order mới
        $(document).ready(function () {
            $.ajax({
                url: '/admin/count-orders',
                method: 'GET',
                success: function (resp) {
                    $('#count-orders').text(resp);
                },
                error: function () {
                    alert("Cannot get data");
                }
            })
        });
        //Lấy số sản phẩm mới
        $(document).ready(function () {
            $.ajax({
                url: '/admin/count-products',
                method: 'GET',
                success: function (resp) {
                    $('#count-products').text(resp);
                },
                error: function () {
                    alert("Cannot get data");
                }
            })
        });

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

        $(function () {
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
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                //do something, like clearing an input
                $('#reportrange').val('');
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                // console.log();
                // console.log(picker.endDate.format('YYYY-MM-DD'));
                var startDate = picker.startDate.format('YYYY-MM-DD');
                var endDate = picker.endDate.format('YYYY-MM-DD');
                $.ajax({
                    url: '/admin/chart?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        if (resp.length == 0) {
                            swal('Không có dữ liệu', 'Vui lòng lựa chọn khoảng thời gian khác.', 'warning');
                            return;
                        }
                        ;
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
                        if (resp.length == 0) {
                            swal('Không có dữ liệu', 'Vui lòng lựa chọn khoảng thời gian khác.', 'warning');
                            return;
                        }
                        ;
                        drawChart_1(resp);
                    },
                    error: function () {
                        swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                });

                $.ajax({
                    url: '/admin/count-orders?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        $('#count-orders').text(resp);
                    },
                    error: function () {
                        swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                })

                $.ajax({
                    url: '/admin/count-products?startDate=' + startDate + '&endDate=' + endDate,
                    method: 'GET',
                    success: function (resp) {
                        $('#count-products').text(resp);
                    },
                    error: function () {
                        swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
                    }
                })
            });
        });
    </script>

    <script>

    </script>
@endsection