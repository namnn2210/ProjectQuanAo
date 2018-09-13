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
    $('#reportrange').on('apply.daterangepicker', function (ev, picker){
        var startDate = picker.startDate.format('YYYY-MM-DD');
        var endDate = picker.endDate.format('YYYY-MM-DD');
        $.ajax({
            url: '/admin/order-search',
            method: 'post',
            data: {
                startDate: startDate,
                endDate: endDate,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                var new_content = '';
                var new_items = resp.orders;
                var new_item_details = resp.order_details;
                var new_item_details_product = resp.products;
                if ($.isEmptyObject(new_items)) {
                    new_content += '<h2> Không có tìm thấy đơn hàng nào';
                    new_content += '</h2>';
                }
                else {
                    for (var i in new_items){
                        new_content += '<tr class="odd gradeX row-item" id="row-item-' + new_items[i].id + '"' + '>';
                        new_content += '<td style="text-align:center">' + new_items[i].customer_id + '</td>';
                        new_content += '<th style="text-align:center">' + 'namnn13' + '</th>';
                        new_content += '<td style="text-align:center">';
                        new_content += '-' + new_items[i].ship_name + '<br>' + '-' + new_items[i].ship_phone + '<br>' + '-' + new_items[i].ship_address;
                        new_content += '</td>';
                        new_content += '<td>' + new_items[i].created_at +'</td>';
                        new_content += '<td>';
                        new_content += '<ul>';
                        for(var j in new_item_details){
                            if(new_item_details[j].order_id == new_items[i].id){
                                for(var k in new_item_details_product){
                                    if(new_item_details_product[k].id == new_item_details[j].product_id){
                                        new_content += '<li>';
                                        new_content += new_item_details_product[k].name + ' - ' +  new_item_details[j].quantity;
                                        new_content += '</li>';
                                    }
                                }
                            }
                        }
                        new_content += '</ul>';
                        new_content += '</td>';
                        new_content += '<td class="status">';
                        if(new_items[i].status == 0){
                            new_content += '<div class="order-pending-banner text-center">';
                            new_content += 'Đang chờ xử lý';
                            new_content += '</div>';
                        }
                        if(new_items[i].status == -1){
                            new_content += '<div class="order-cancel-banner text-center">';
                            new_content += 'Đã hủy';
                            new_content += '</div>';
                        }
                        if(new_items[i].status == 1){
                            new_content += '<div class="order-confirm-banner text-center">';
                            new_content += 'Đã xác nhận';
                            new_content += '</div>';
                        }
                        if(new_items[i].status == 2){
                            new_content += '<div class="order-complete-banner text-center">';
                            new_content += 'Hoàn thành';
                            new_content += '</div>';
                        }
                        new_content += '</td>';
                        new_content += '<td style="text-align: center" class="status_icon">';
                        if(new_items[i].status == 1){
                            new_content += '<span class="fa fa-check-circle" id="' + new_items[i].id + '"' + '>' + '</span>';
                        }
                        if(new_items[i].status == 0){
                            new_content += '<span class="fa fa-check-circle-o" id="' + new_items[i].id + '"' + '>' + '</span>';
                        }
                        if(new_items[i].status == 2){
                            new_content += '<span class="fa fa-check" style="color: black"></span>';
                        }
                        if(new_items[i].status == 0){
                            new_content += '<span class="fa fa-trash"></span>';
                        }
                        if(new_items[i].status == -1){
                            new_content += '<span class="fa fa-minus-circle"></span>';
                        }
                        new_content += '</td>';
                        new_content += '</tr>';
                    }
                }
                $('#order_list').html(new_content);
                $('#dataTables-example_filter').remove();
                $('#dataTables-example_info').remove();
                $('#dataTables-example_paginate').remove();
                $('#dataTables-example_length').remove();
                $('#dataTables-example').DataTable({
                    responsive: true,
                    bDestroy: true
                });
            },
            error: function () {
                swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
            }
        });
    });
});

function changeStatus(deleteId, status, status_text){
    $.ajax({
        method: 'post',
        url: '/admin/order/change-status',
        data:{
            id: deleteId,
            status: status,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (resp){
            var id = 'row-item-' + resp;
            $('#' + id).find('.status div').text(status_text);
            if(status == 1){
                $('#' + id).find('.status_icon span').removeClass('fa-check-circle-o');
                $('#' + id).find('.status_icon span').addClass('fa-check-circle');
                $('#' + id).find('.fa-trash').remove();
            }
            if(status == 2){
                $('#' + id).find('.status_icon span').removeClass('fa-check-circle');
                $('#' + id).find('.status_icon span').addClass('fa-check');
            }
        },
        error: function () {
            swal('Có lỗi xảy ra', 'Không thể lấy dữ liệu từ api', 'error');
        }
    })
}

$(document).on('click', '.fa-check-circle' ,function(){
    var deleteId = this.id;
    var status = '2';
    var status_text = 'Hoàn thành';
    if(confirm('Bạn có chắc muốn hoàn thành đơn hàng?')){
        // location.href = '/admin/order/change-status?id=' + deleteId + '&status=2';
        changeStatus(deleteId, status, status_text);
    }
});

$(document).on('click', '.fa-check-circle-o' ,function(){
    var deleteId = this.id;
    var status = '1';
    var status_text = 'Đã xác nhận';
    if(confirm('Bạn có chắc muốn xác nhận đơn hàng?')){
        // location.href = '/admin/order/change-status?id=' + deleteId + '&status=1';
        changeStatus(deleteId, status ,status_text);
    }
});