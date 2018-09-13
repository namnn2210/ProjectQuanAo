<!--Script LineChart -->
// Lấy số order mới
$(document).ready(function () {
    $.ajax({
        url: '/admin/count-orders',
        method: 'GET',
        success: function (resp) {
            $('#count-orders').text(resp);
        },
        error: function () {
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
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
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
        }
    })
});
//Lấy số subscriber mới
$(document).ready(function () {
    $.ajax({
        url: '/admin/count-subscribers',
        method: 'GET',
        success: function (resp) {
            $('#count-subscribers').text(resp);
        },
        error: function () {
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
        }
    })
});
//Lấy tổng doanh thu
$(document).ready(function () {
    $.ajax({
        url: '/admin/total-revenue',
        method: 'GET',
        success: function (resp) {
            $('#revenue').text(numeral(resp[0].revenue).format(0,0) + ' VND');
        },
        error: function () {
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
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

google.charts.load('current', {'packages': ['bar']});
google.charts.setOnLoadCallback(function () {
    $.ajax({
        url: '/admin/chart-2',
        method: 'GET',
        success: function (resp) {
            drawChart_2(resp);
        },
        error: function () {
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
        }

    });
});

function drawChart_2(chart_data){
    var data = google.visualization.arrayToDataTable([
        ['Khung giờ', 'Sản phẩm'],
        [chart_data[0].timeslot, Number(chart_data[0].quantity)],
    ]);
    for (var i = 1; i < chart_data.length; i++) {
        data.addRow([chart_data[i].timeslot, Number(chart_data[i].quantity)]);
    }
    var options = {
        height: 400,
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
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
            url:'/admin/chart-2?startDate=' + startDate + '&endDate=' + endDate,
            method: 'GET',
            success: function (resp) {
                if (resp.length == 0) {
                    swal('Không có dữ liệu', 'Vui lòng lựa chọn khoảng thời gian khác.', 'warning');
                    return;
                }
                ;
                drawChart_2(resp);
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        })

        $.ajax({
            url: '/admin/count-orders?startDate=' + startDate + '&endDate=' + endDate,
            method: 'GET',
            success: function (resp) {
                $('#count-orders').text(resp);
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        });

        $.ajax({
            url: '/admin/count-products?startDate=' + startDate + '&endDate=' + endDate,
            method: 'GET',
            success: function (resp) {
                $('#count-products').text(resp);
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        });

        $.ajax({
            url: '/admin/count-subscribers?startDate=' + startDate + '&endDate=' + endDate,
            method: 'GET',
            success: function (resp) {
                $('#count-subscribers').text(resp);
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        });

        $.ajax({
            url: '/admin/total-revenue?startDate=' + startDate + '&endDate=' + endDate,
            method: 'GET',
            success: function (resp) {
                $('#revenue').text(numeral(resp[0].revenue).format(0,0) + ' VND');
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        });
    });
});
