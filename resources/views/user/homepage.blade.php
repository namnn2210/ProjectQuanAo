@extends('layouts.user-master-layout',['currentPage' => 'homepage'])
@section('page-title','Mens Fashion - Designer Clothing 2018 - Farfetch')
@section('content')
    <section class="slide1">
        <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1"
                     style="background-image: url({{asset('img/men-collection.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                              data-appear="fadeInDown" style="color: black">
							Bộ sưu tập thời trang nam 2018
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="fadeInUp" style="color: black">
                            NEW ARRIVALS
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="/product" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item2-slick1"
                     style="background-image: url({{asset('img/summer-collection.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                              data-appear="rollIn" style="color:black;">
							Bộ sưu tập thời trang nam 2018
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="lightSpeedIn">

                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="slideInUp">
                            <!-- Button -->
                            <a href="/product" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>

                <div class="item-slick1 item3-slick1"
                     style="background-image: url({{asset('img/winter-collection.jpg')}});">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15"
                              data-appear="rotateInDownLeft">
							Bộ sưu tập thời trang nam 2018
						</span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37"
                            data-appear="rotateInUpRight">
                            NEW ARRIVALS
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="rotateIn">
                            <!-- Button -->
                            <a href="/product" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Mua ngay
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="banner bgwhite p-t-40 p-b-40">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{$ao_khoac->image}}" alt="IMG-BENNER">
                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{'/product'.'?categoryId='.$ao_khoac->id}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Áo khoác
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{$ao_phong->image}}" alt="IMG-BENNER">
                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{'/product'.'?categoryId='.$ao_phong->id}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Áo sơ mi
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{$giay->image}}" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{'/product'.'?categoryId='.$giay->id}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Giày
                            </a>
                        </div>
                    </div>

                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{$phu_kien->image}}" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{'/product'.'?categoryId='.$phu_kien->id}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Phụ kiện
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-10 col-md-8 col-lg-4 m-l-r-auto">
                    <!-- block1 -->
                    <div class="block1 hov-img-zoom pos-relative m-b-30">
                        <img src="{{$balo->image}}" alt="IMG-BENNER">

                        <div class="block1-wrapbtn w-size2">
                            <!-- Button -->
                            <a href="{{'/product'.'?categoryId='.$balo->id}}" class="flex-c-m size2 m-text2 bg3 hov1 trans-0-4">
                                Balo
                            </a>
                        </div>
                    </div>

                    <!-- block2 -->
                    <div class="block2 wrap-pic-w pos-relative m-b-30">
                        <img src="{{asset('img/bg-01.jpg')}}" alt="IMG">

                        <div class="block2-content sizefull ab-t-l flex-col-c-m">
                            <h4 class="m-text4 t-center w-size3 p-b-8">
                                Đăng kí để nhận voucher giảm giá 20%
                            </h4>

                            <p class="t-center w-size4">
                                Hãy là người đầu tiên nhận những thông tin mới nhất về thời trang và các chương trình
                                khuyến mãi của cửa hàng chúng tôi
                            </p>

                            <div class="w-size2 p-t-25">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                    Đăng kí
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Product -->
    <section class="newproduct bgwhite p-t-45 p-b-105">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    SẢN PHẢM NỔI BẬT
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($obj as $item)
                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative" style="text-align: center">
                                    <?php
                                    if($item -> BlockStyle == 'both'){
                                        echo '<span class="block2-labelsale text-danger">'. '-' . $item -> discount . '%' . '</span>' . '<span class="block2-labelnew"></span>';
                                    }
                                    else if($item -> BlockStyle == 'new'){
                                        echo '<span class="block2-labelnew"></span>';
                                    }
                                    else if($item -> BlockStyle == 'sale'){
                                        echo '<span class="block2-labelsale">' . '-' . $item -> discount . '%' . '</span>';
                                    }
                                    ?>
                                    <img src="<?php echo explode("&", $item->images, -1)[0];?>" alt="IMG-PRODUCT">
                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4" id="add-cart-{{$item->id}}">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Thêm vào giỏ hàng
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20" style="text-align: center">
                                    <a href="/product/{{$item->id}}" class="block2-name dis-block s-text3 p-b-5">
                                        {{$item->name}}
                                    </a>

                                    <span class="block2-newprice m-text8 p-r-5">
									{{$item->discountPriceString}}
								</span>

                                    <span class="block2-oldprice m-text7 p-r-5">
									{{$item->originalPriceString}}
								</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    <!-- Instagram -->
    <section class="instagram p-t-20">
        <div class="sec-title p-b-52 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                @ Theo dõi chúng tôi trên Instagram
            </h3>
        </div>

        <div class="flex-w">
            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="{{asset('img/insta-1.jpg')}}" alt="IMG-INSTAGRAM">

                <a href="https://www.instagram.com/farfetch/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget
                            metus elit.
                        </p>

                        <span class="s-text9">
							Photo by @nancyward
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="{{asset('img/insta-2.jpg')}}" alt="IMG-INSTAGRAM">

                <a href="https://www.instagram.com/farfetch/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget
                            metus elit.
                        </p>

                        <span class="s-text9">
							Photo by @nancyward
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="{{asset('img/insta-3.jpg')}}" alt="IMG-INSTAGRAM">

                <a href="https://www.instagram.com/farfetch/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget
                            metus elit.
                        </p>

                        <span class="s-text9">
							Photo by @nancyward
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="{{asset('img/insta-4.jpg')}}" alt="IMG-INSTAGRAM">

                <a href="https://www.instagram.com/farfetch/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget
                            metus elit.
                        </p>

                        <span class="s-text9">
							Photo by @nancyward
						</span>
                    </div>
                </a>
            </div>

            <!-- Block4 -->
            <div class="block4 wrap-pic-w">
                <img src="{{asset('img/insta-5.jpg')}}" alt="IMG-INSTAGRAM">

                <a href="https://www.instagram.com/farfetch/" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="icon_heart_alt fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">39</span>
					</span>

                    <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                        <p class="s-text10 m-b-15 h-size1 of-hidden">
                            Nullam scelerisque, lacus sed consequat laoreet, dui enim iaculis leo, eu viverra ex nulla
                            in tellus. Nullam nec ornare tellus, ac fringilla lacus. Ut sit amet enim orci. Nam eget
                            metus elit.
                        </p>

                        <span class="s-text9">
							Photo by @nancyward
						</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Shipping -->
    <section class="shipping bgwhite p-t-62 p-b-46">
        <div class="flex-w p-l-15 p-r-15">
            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Miễn phí vận chuyển toàn quốc
                </h4>

                <a href="#" class="s-text11 t-center">
                    Ấn vào đây để biết thêm chi tiết
                </a>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
                <h4 class="m-text12 t-center">
                    Đổi trả hàng trong 30 ngày
                </h4>

                <span class="s-text11 t-center">
                    Dễ dàng trả lại hàng trong 30 ngày và thay thế bằng một sản phẩm mới
				</span>
            </div>

            <div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
                <h4 class="m-text12 t-center">
                    Thời gian mở cửa
                </h4>

                <span class="s-text11 t-center">
					Cửa hàng mở cửa từ Thứ 2 đến Chủ nhật hàng tuần
				</span>
            </div>
        </div>
    </section>
@endsection