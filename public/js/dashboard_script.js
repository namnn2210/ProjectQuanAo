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
        height: 500,
        hAxis: {
            format: 'dd/MM/yyyy'
        }
    };

    var chart = new google.charts.Line(document.getElementById('linechart_material'));

    chart.draw(data, google.charts.Line.convertOptions(options));
}