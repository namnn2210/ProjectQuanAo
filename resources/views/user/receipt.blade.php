@extends('layouts.user-master-layout',['currentPage' => 'Products'])
@section('page-title','Product')
@section('content')
    <div class="m-t-50 align-items-center"><img class="center-block" src="{{asset('img/0b23a3c7c111f23618f91f722fe02a09.png')}}" style="max-width: 30%"></div>
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="visited first">
                <a href="#">Giỏ hàng</a>
            </li>
            <li class="previos visited"><a href="#">Thông tin giao hàng</a></li>
            <li class="previos visited"><a href="#">Thanh toán</a></li>
            <li class="active">Hoàn thành</li>
        </ul>
    </div>
<div class="invoice-box" style="margin-top: 180px; margin-bottom: 30px">
    <img src="{{asset('img/0b23a3c7c111f23618f91f722fe02a09.png')}}" style="max-width: 30%">
    <hr>
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="2">
                <table>
                    <tr>
                        <p>Cảm ơn quý khách đã đặt hàng tại Farfetch. Đơn hàng #{{$order -> id}} của quý khách đã được tiếp nhận và đang trong quá trình xử lý.
                            Farfetch sẽ thông báo đến quý khách ngay khi hàng chuẩn bị được giao.</p>
                        <br>
                        <h4>Thông tin đơn hàng #{{$order -> id}} ({{$order -> created_at}})</h4>
                        <hr>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            <b>Thông tin thanh toán</b><br>
                            {{$order -> ship_name}}<br>
                            {{$order -> ship_email}}<br>
                            {{$order -> ship_phone}}
                        </td>

                        <td>
                            <b>Địa chỉ giao hàng</b><br>
                            {{$order -> ship_name}}<br>
                            {{$order -> ship_address}}<br>
                            {{$order -> ship_phone}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td>
                Phương thức thanh toán
            </td>
            <td>
                Đã thanh toán
            </td>
        </tr>

        <tr class="details">
            <td>
                {{$order -> payment_method}}
            </td>

            <td>
                {{$order -> paymentMethod()}}
            </td>
        </tr>

        <tr class="heading">
            <td>
                Đơn hàng
            </td>

            <td>
                Giá
            </td>
        </tr>
        @foreach($order_details as $item)
        <tr class="item">
            <td>
                {{$item -> product -> name}}
            </td>
            <td class="price">
                {{$item -> PriceString}}
            </td>
        </tr>
        @endforeach
        <tr >
            <td>Tổng giá trị sản phẩm</td>
            <td class="receipt_items_total_price">
                {{$order -> PriceString}}
            </td>
        </tr>
        <tr>
            <td>Phí vận chuyển</td>
            <td class="shipping_fee">
                0 VNĐ
            </td>
        </tr>
        <tr class="total">
            <td>Tổng giá trị đơn hàng</td>
            <td class="receipt_total_price">
                {{$order -> PriceString}}
            </td>
        </tr>
    </table>
</div>
@endsection