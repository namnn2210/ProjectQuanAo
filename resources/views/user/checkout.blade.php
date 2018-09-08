@extends('layouts.user-master-layout',['currentPage' => 'cart'])
@section('page-title','Giỏ hàng')
@section('content')
   <div class="row row-eq-height">
       <div class="col-8">
           <div class="m-t-50 align-items-center"><img class="center-block" src="{{asset('img/0b23a3c7c111f23618f91f722fe02a09.png')}}" style="max-width: 30%"></div>
           <div class="checkout-wrap">
               <ul class="checkout-bar">
                   <li class="visited first">
                       <a href="#">Giỏ hàng</a>
                   </li>
                   <li class="active">Thông tin khách hàng</li>
                   <li class="next">Hoàn thành</li>
               </ul>
           </div>
           <div class="m-t-180 m-l-30">
               <form>
                   <h3 class="m-b-30">Thông tin liên hệ</h3>
                   <div class="form-group">
                       <textarea class="form-control" placeholder="Email" name="email" rows="2"></textarea>
                   </div>
                   <h3 class="m-t-70 m-b-30">Địa chỉ giao hàng</h3>
                   <div class="form-group">
                       <textarea class="form-control" placeholder="Họ Tên" name="name" rows="2"></textarea>
                   </div>
                   <div class="form-group">
                       <textarea class="form-control" placeholder="Địa Chỉ" name="address" rows="2"></textarea>
                   </div>
                   <div class="form-group">
                       <textarea class="form-control" placeholder="Thành Phố" name="city" rows="2"></textarea>
                   </div>
                   <div class="form-group">
                       <textarea class="form-control" placeholder="Số Điện Thoại" name="phone" rows="2"></textarea>
                   </div>
                   <div class="size12 trans-0-4 m-t-30 m-b-10 m-r-10 float-left">
                       <!-- Button -->
                       <a href="/product">
                           <button type="button" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                               Tiếp tục mua hàng
                           </button>
                       </a>
                   </div>
                   <div class="trans-0-4 m-t-30 m-b-10 float-right" id="paypal-button">
                   </div>
               </form>
           </div>
       </div>
       <div class="col-4" style="background-color: #F8F8F8;">
           <table class="m-t-30 affix">
               @foreach($shopping_cart->items as $item)
                   <tr class="table-row" id="item-{{$item->product->id}}">
                       <td class="column-1">
                           <div class="cart-img-product b-rad-4 o-f-hidden">
                               <img src="<?php echo explode("&",$item->product->images,-1)[0];?>" alt="{{$item->product->name}}">
                           </div>
                       </td>
                       <td class="column-2">{{$item->product->name}}</td>
                       <td class="column-3 item-{{$item->product->id}}">{{$item->getTotalPriceWithFormat()}} VNĐ</td>
                   </tr>
               @endforeach
           </table>
           <div class="search-product pos-relative bo4 of-hidden m-t-30">
               <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="discountCode"
                      placeholder="Mã Giảm Giá">
               <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4 btn-apply">
                   <i class="fs-12" aria-hidden="true">Áp Dụng</i>
               </button>
           </div>
           <hr>
           <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng cộng:
					</span>
               <h4 class="total_price">{{$shopping_cart -> getTotalMoneyWithFormat()}}</h4>
           </div>
           <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Phí Giao Hàng
					</span>
               <h4 class="total_price">Miễn Phí</h4>
           </div>
           <hr>
           <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Tổng cộng:
					</span>
               <h4 class="total_price checkout-price">{{$shopping_cart -> getTotalMoneyWithFormat()}}</h4>
           </div>
       </div>
   </div>
@endsection