@extends('layouts.new-master', ['currentPage' => 'list'])
@section('page-title', 'DANH SÁCH ĐƠN HÀNG')
@section('active-order','active')
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
    <div class="panel-body">
        @if(session()->has('message'))
            <div class="alert alert-success hidden">
            </div>
        @endif
        <table width="100%" class="table table-hover" id="dataTables-example">
            <thead>
            <tr>
                <th style="text-align: center">ID Khách hàng</th>
                <th style="text-align: center">Người đặt</th>
                <th style="text-align: center">Tên Khách hàng</th>
                <th style="text-align: center">Thời gian</th>
                <th style="text-align: center">Thông tin</th>
                <th style="text-align: center">Trạng thái</th>
                <th class="black-icon" style="text-align: center">Thao tác</th>
            </tr>
            </thead>
            <tbody id="order_list">
            @foreach($obj as $item)
                <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                    <td style="text-align: center">{{$item -> customer_id}}</td>
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
                    <td class="status">
                        @if($item->status==0)
                            <div class="order-pending-banner text-center">
                                Chờ xử lý
                            </div>
                        @endif
                        @if($item->status==-1)
                            <div class="order-cancel-banner text-center">
                                Đã hủy
                            </div>
                        @endif
                        @if($item->status==1)
                            <div class="order-confirm-banner text-center">
                                Đã xác nhận
                            </div>
                        @endif
                        @if($item->status==2)
                            <div class="order-complete-banner text-center">
                                Hoàn thành
                            </div>
                        @endif
                    </td>
                    <td style="text-align: center" class="status_icon">
                        @if($item->status==0)
                            <span class="fa fa-check-circle-o" id="{{$item->id}}"></span>
                        @elseif($item->status==1)
                            <span href="#" class="fa fa-check-circle" id="{{$item->id}}"></span>
                        @elseif($item->status==2)
                            <span class="fa fa-check"></span>
                        @endif
                        @if($item->status==0)
                            <a href="#" class="fa fa-trash"></a>
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
    <script src="{{asset('/js/order_list.js')}}"></script>
@endsection