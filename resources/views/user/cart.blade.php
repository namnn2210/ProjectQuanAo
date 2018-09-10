@extends('layouts.user-master-layout',['currentPage' => 'cart'])
@section('page-title','Giỏ hàng')
@section('content')
    <div class="m-t-50 align-items-center"><img class="center-block" src="{{asset('img/0b23a3c7c111f23618f91f722fe02a09.png')}}" style="max-width: 30%"></div>
    <div class="checkout-wrap">
        <ul class="checkout-bar">
            <li class="active">
                <a href="/view-cart">Giỏ hàng</a>
            </li>
            <li class="next"><a href="#">Thông tin giao hàng</a></li>
            <li class="next"><a href="#">Thanh toán</a></li>
            <li class="">Hoàn thành</li>
        </ul>
    </div>
    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100 m-t-150">
        <div class="container">
            <div id="#cart-item-form">
            <!-- Cart item -->
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th class="column-1"></th>
                                <th class="column-2">Sản phẩm</th>
                                <th class="column-3">Giá</th>
                                <th class="column-4 p-l-70">Số lượng</th>
                                <th class="column-5">Tổng cộng</th>
                            </tr>
                            <tbody id="cart-items">
                            @foreach($shopping_cart->items as $item)
                                <tr class="table-row" id="item-{{$item->product->id}}">
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            <img src="<?php echo explode("&",$item->product->images,-1)[0];?>" alt="{{$item->product->name}}">
                                        </div>
                                    </td>
                                    <td class="column-2">{{$item->product->name}}</td>
                                    <td class="column-3">{{$item->product->discountPriceString}}</td>
                                    <td class="column-4 p-l-40">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 btn-cart-num-up">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="size8 m-text18 t-center num-product" type="number" name="products[{{$item->product->id}}]" value="{{$item->quantity}}">
                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 btn-cart-num-down">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="column-5 item-{{$item->product->id}}">{{$item->getTotalPriceWithFormat()}} VNĐ</td>
                                    <td class="column-6 p-r-30"><i class="fa fa-close" style="color: black"></i></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="flex-w flex-m w-full-sm">
                        <div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
                            <!-- Button -->
                            <a href="/product">
                                <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Tiếp tục mua hàng
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 btn-update-cart">
                            Cập nhật giỏ hàng
                        </button>
                    </div>
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" onclick="window.location.href = '/checkout'">
                            Thanh toán
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection