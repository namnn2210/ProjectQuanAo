$(".fa-trash").click(function () {
    var deleteId = this.id;
    if (confirm("Are you sure?")) {
        $.ajax({
            method: 'DELETE',
            url: '/admin/order/' + deleteId,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                swal({
                        title: 'Deleted',
                        text: 'This product has been deleted',
                        type: 'success',
                        allowOutsideClick: true,
                    },
                    function (isConfirm) {
                        if (isConfirm) {
                            $("#row-item" + deleteId).remove();
                            window.location.reload();
                        }
                    });
            },
            error: function (resp) {
                swal("Error", "Delete Failed", "error");
            }
        })
    }
});

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
        var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        $.ajax({
            url: '/order-search',
            method: 'post',
            data: {
                startDate: startDate,
                endDate: endDate,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                var new_content = '';
                var new_items = resp;
                if ($.isEmptyObject(new_items)) {
                    new_content += '<h2> Không có tìm thấy đơn hàng nào';
                    new_content += '</h2>';
                }
                else {
                    for (var i in new_items) {
                        new_content += '<tr class="odd gradeX row-item" id="row-item-' + new_items[i].id + '"' + '>';
                        new_content += '<td style="text-align: center' + '"' + '>' + new_items[i].customer_id + '</td>';
                        new_content += '<th style="text-align: center' + '"' + '>' + 'namnn13' + '</th>';
                        new_content += '<td style="text-align: center' +'"' + '>' + '!!' +  new_items[i].shipInformation + '!!' + '</td>';
                        new_content += '<td>' +new_items[i].created_at +'</td>';
                        new_content += '<li>' + '{{' + '$order_detail' + '->' + 'product' + '->' +'name' +'}}' + '-' + '{{' + '$order_detail' + '->' + 'quantity' + '}}' + '</li>';
                        new_content += '<div class="order-pending-banner text-center' + '"' +'>';
                        new_content += 'Chờ xử lý';
                        new_content += '</div>';
                        new_content += '<div class="order-cancel-banner text-center' + '"' + '>';
                        new_content += 'Đã hủy';
                        new_content += '</div>';
                        new_content += '<div class="order-confirm-banner text-center' +'"' +'>';
                        new_content += 'Đã xác nhận';
                        new_content += '<div class="order-complete-banner text-center' +'"' +'>';
                        new_content += 'Hoàn thành';
                        new_content += '</div>';
                        new_content += '<td style="text-align: center' +'"' +'>';
                        new_content += '<a href' +'='+'"'+'/admin/order/change-status'+'?id='+new_items[i].id+'&status=1'+'onclick'+ '='+'"'+'return confirm'+'('+"'"+'Bạn có chắc muốn xác nhận đơn hàng?'+"'" + ')' +'"' + 'class'+'='+'"' + 'fa fa-check-circle-o' + '"' + '>' + '</a>';
                        new_content += '<a href' +'='+'"'+'/admin/order/change-status'+'?id='+new_items[i].id+'&status=2'+'onclick'+ '='+'"'+'return confirm'+'('+"'"+'Bạn có chắc muốn xác nhận đơn hàng?'+"'" + ')' +'"' + 'class'+'='+'"' + 'fa fa-check-circle-o' + '"' + '>' + '</a>';
                        new_content += '<span class' +'=' +'"' + 'fa fa-check' + '"' + '>' + '</span>';
                        new_content += '<a href=' +'"' +'#' + '"' + 'id=' +'"' + new_items[i].id + 'class='+ '"' + 'fa fa-trash' +'"' + '>' + '</a>';
                        new_content += '<a href=' +'"' + new_items[i].id + '"' + 'class=' +'"' + 'fa fa-minus-circle' +'"' +'>' +'</a>';4
                        new_content += '</td>';
                        new_content += '</tr>';
                    }
                }
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        })
    });
});