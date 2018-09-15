@extends('layouts.new-master',['currentPage' => 'dashboard'])
@section('page-title', 'Trang chủ')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">DANH SÁCH ĐƠN HÀNG MỚI</h1>
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
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $item)
                <tr class="odd gradeX row-item" id="row-item-{{$item->id}}">
                    <td style="text-align: center">{{$item->customer_id}}</td>
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
                    <td>@if($item->status==0)
                            <div class="order-pending-banner text-center">
                                Chờ xử lý
                            </div>
                        @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection