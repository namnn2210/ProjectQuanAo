@extends('layouts.user-master-layout',['currentPage' => 'cart'])
@section('page-title','Thanh toán')
@section('content')
    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
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

            <form action="/checkout" name="order-form" method="POST">
            @csrf()
            <!-- Total -->
            <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
                <h5 class="m-text20 p-b-24">
                    Hóa đơn
                </h5>
                <!--  -->
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Thông tin giao hàng:
					</span>

                    <div class="w-size20 w-full-sm">
                        <p class="s-text8 p-b-23">
                            Vui lòng nhập thông tin giao hàng tại đây:
                        </p>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship_name"
                                   placeholder="Họ và tên">
                        </div>

                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship_address"
                                   placeholder="Địa chỉ giao hàng">
                        </div>

                        <div class="size13 bo4 m-b-22">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="ship_phone"
                                   placeholder="Số điện thoại">
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng cộng:
					</span>
                    <h4 class="total_price">{{$shopping_cart -> getTotalMoneyWithFormat()}}</h4>
                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Tiếp tục thanh toán
                    </button>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection