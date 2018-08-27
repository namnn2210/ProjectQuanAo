@extends('layouts.master', ['currentPage' => 'list'])
@section('page-title', 'DANH SÁCH ĐƠN HÀNG')
@section('active-order','active')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">DANH SÁCH ĐƠN HÀNG</h1>
        </div>
    </div>
    <div class="panel-body">
        @if(session()->has('message'))
            <div class="alert alert-success hidden">
            </div>
        @endif
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th style="text-align: center">ID Khách hàng</th>
                <
                <th style="text-align: center">Người đặt</th>
                <th style="text-align: center">Tên Khách hàng</th>
                <th style="text-align: center">Thời gian</th>
                <th style="text-align: center">Thông tin</th>
                <th style="text-align: center">Trạng thái</th>
                <th style="text-align: center">Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($obj as $item)
                <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                    <td style="text-align: center">{{$item -> customer_id}}</td>
                    <
                    <th style="text-align: center">namnn13</th>
                    <td style="text-align: center">{!! $item->shipInformation !!}</td>
                    <td>{{$item -> created_at}}</td>
                    <td>
                        <ul>
                            @foreach($item->details as $order_detail)
                                <li>{{$order_detail->product->name}} - {{$order_detail->quantity}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$item -> ship_phone}}</td>
                    <td style="text-align: center">
                        @if($item->status==0)
                            <a href="/admin/order/change-status?id={{$item->id}}&status=1"
                               onclick="return confirm('Bạn có chắc muốn xác nhận đơn hàng?')"
                               class="btn btn-success fa fa-check-circle-o"></a>
                        @elseif($item->status==1)
                            <a href="/admin/order/change-status?id={{$item->id}}&status=2"
                               onclick="return confirm('Bạn có chắc muốn hoàn thành đơn hàng?')"
                               class="btn btn-simple btn-success fa fa-check-circle"></a>
                        @elseif($item->status==2)
                            <span class="btn btn-simple btn-success fa fa-check"></span>
                        @endif
                        @if($item->status==0)
                            <a href="{{$item->id}}" class="btn btn-simple btn-danger fa fa-trash btn-delete"></a>
                        @endif
                        @if($item->status==-1)
                            <a href="{{$item->id}}" class="fa fa-minus-circle"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(".fa fa-trash").click(function () {
            var id = $(this).attr('href');
            if (confirm("Bạn có chắc chắn muốn xóa đơn hàng này không ?")) {
                $.ajax({
                    url: 'admin/order/' + id,
                    method: 'DELETE',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (resp) {
                        swal({
                                title: 'Xóa thành công',
                                text: 'Đơn hàng đã được xóa',
                                type: 'success',
                                allowOutsideClick: true,
                                html: true
                            },
                            function (isConfirm) {
                                if (isConfirm) {
                                    $("#row-item" + id).remove();
                                    window.location.reload();
                                }
                            });
                    },
                    error: function (resp) {
                        swal("Có lỗi xảy ra", "Vui lòng thử lại sau");
                    }
                })
            }
        });
    </script>
@endsection