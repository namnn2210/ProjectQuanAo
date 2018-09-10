<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700' rel='stylesheet' type='text/css'>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <link rel="stylesheet" href="{{asset('font/font-awesome/css/font-awesome.min.css')}}"/>
    <title>@yield('page-title')</title>
    <link rel="icon" type="image/png" href="{{asset('img/favicon.ico')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/icon-font.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/hamburgers.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/animsition.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/daterangepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/lightbox.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/main.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('font/user-master-layout-font/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/product.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/checkout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/receipt.css')}}">
    <link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/js/jquery.paginate.css')}}">
</head>
<body>
<div class="animsition">
    <!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="https://www.facebook.com/farfetch.asiapac/?brand_redir=88573992939"
                       class="topbar-social-item fa fa-facebook"></a>
                    <a href="https://www.instagram.com/farfetch/" class="topbar-social-item fa fa-instagram"></a>
                    <a href="https://www.youtube.com/user/farfetchdotcom"
                       class="topbar-social-item fa fa-youtube-play"></a>
                </div>

                <span class="topbar-child1">
					Giao hàng miễn phí với đơn hàng trên 2000000VNĐ
				</span>

                <div class="topbar-child2">
					<span class="topbar-email">
						farfetch@gmail.com
					</span>
                </div>
            </div>

            <div class="wrap_header">
                <!-- Logo -->
                <a href="/" class="logo">
                    <img src="{{asset('img/farfetch-logo.png')}}" style="max-height: 60px;" alt="IMG-LOGO">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="/">Trang chủ</a>
                            </li>

                            <li>
                                <a href="/product">Cửa hàng</a>
                                <ul class="sub_menu">
                                    @foreach($obj_category as $item)
                                        <li><a href="{{'/product'.'?categoryId='.$item->id}}">{{$item -> name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="sale-noti">
                                <a href="{{'/product'.'?bigSale=1'}}">Giảm giá sốc</a>
                            </li>

                            <li>
                                <a href="/about">Giới thiệu</a>
                            </li>

                            <li>
                                <a href="/contact">Liên hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">
                    <div class="header-wrapicon2">
                        <img src="{{asset('img/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown"
                             alt="ICON">
                        <span class="header-icons-noti">{{\App\ShoppingCart::getTotalItem()}}</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem" id="header-cart-wrapitem">
                                @if(count(\App\ShoppingCart::getCart()->items)>0)
                                    @foreach(\App\ShoppingCart::getCart()->items as $item)
                                        <li class="header-cart-item">
                                            <div class="header-cart-item-img">
                                                <img src="<?php echo explode("&", $item->product->images, -1)[0];?>"
                                                     alt="IMG">
                                            </div>
                                            <div class="header-cart-item-txt">
                                                <a href="#" class="header-cart-item-name">
                                                    {{$item->product->name}}
                                                </a>

                                                <span class="header-cart-item-info">
                                                {{$item->quantity}} x {{$item->product->discountPriceString}}
                                            </span>
                                            </div>
                                        </li>
                                    @endforeach
                                @else
                                    'Hiện tại không có sản phẩm nào trong giỏ hàng'
                                @endif
                            </ul>
                            <div class="header-cart-total">
                                Tổng cộng: <span
                                        id="header-cart-total">{{\App\ShoppingCart::getCart()->getTotalMoneyString()}}</span>
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="/view-cart"
                                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Xem giỏ hàng
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="result">
        @section('content')
        @show
    </div>

    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
        <div class="flex-w p-b-90">
            <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    GIỮ LIÊN LẠC VỚI CHÚNG TÔI
                </h4>

                <div>
                    <p class="s-text7 w-size27">
                        Bạn có câu hỏi gì không? Hãy cho chúng tôi biết tại cửa hàng số 8 Tôn Thất Thuyết, Nam Từ Liêm,
                        Hà Nội hoặc gọi cho chúng tôi theo số (+84) 12345678
                    </p>

                    <div class="flex-m p-t-30">
                        <a href="https://www.facebook.com/farfetch.asiapac/?brand_redir=88573992939"
                           class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                        <a href="https://www.instagram.com/farfetch/" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                        <a href="https://www.youtube.com/user/farfetchdotcom"
                           class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                    </div>
                </div>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Danh mục sản phẩm
                </h4>

                <ul>
                    @foreach($obj_category as $item)
                        <li class="p-b-9">
                            <a href="{{'/product'.'?categoryId='.$item->id}}" class="s-text7">
                                {{$item -> name}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Liên kết
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Tìm kiếm
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="/about" class="s-text7">
                            Giới thiệu
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Liên hệ
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Chính sách đổi trả
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Trợ giúp
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Theo dõi đơn hàng
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Đổi trả
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Giao hàng
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="/faqs" class="s-text7">
                            Những câu hỏi thường gặp
                        </a>
                    </li>
                </ul>
            </div>

            <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    Nhận tin tức mới nhất
                </h4>

                <form>
                    <div class="effect1 w-size9">
                        <input class="s-text7 bg6 w-full p-b-5" type="text" name="email"
                               placeholder="email@example.com">
                        <span class="effect1-line"></span>
                    </div>

                    <div class="w-size2 p-t-20">
                        <!-- Button -->
                        <button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                            Đăng ký
                        </button>
                    </div>

                </form>
            </div>
        </div>

        <div class="t-center p-l-15 p-r-15">
            <a href="#">
                <img class="h-size2" src="{{asset('img/bao-kim-icon.PNG')}}" alt="IMG-BAO-KIM">
            </a>

            <a href="#">
                <img class="h-size2" src="{{asset('img/visa.png')}}" alt="IMG-VISA">
            </a>

            <a href="#">
                <img class="h-size2" src="{{asset('img/mastercard.png')}}" alt="IMG-MASTERCARD">
            </a>

            <div class="t-center s-text8 p-t-20">
                Copyright © 2018 All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Back to top -->
    <div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
    </div>

    <!-- Container Selection -->
    <div id="dropDownSelect1"></div>
    <div id="dropDownSelect2"></div>
</div>


<!-- JS IMPORT -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src={{asset("/js/numeral.js")}}></script>

<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/jquery/jquery-3.2.1.min.js")}}></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset("vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/bootstrap/js/popper.js")}}></script>
<script type="text/javascript" src={{asset("vendor/bootstrap/js/bootstrap.min.js")}}></script>
<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/select2/select2.min.js")}}></script>

<script type="text/javascript">
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

</script>
<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/daterangepicker/moment.min.js")}}></script>
<script type="text/javascript" src={{asset("vendor/daterangepicker/daterangepicker.js")}}></script>
<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/slick/slick.min.js")}}></script>
<script type="text/javascript" src={{asset("js/slick-custom.js")}}></script>
<!--===============================================================================================-->
<script type="text/javascript" src={{asset("vendor/sweetalert/sweetalert.min.js")}}></script>

<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/master-layout-2-js/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/master-layout-2-js/slick-custom.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/master-layout-2-js/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/master-layout-2-js/lightbox.min.js')}}"></script>
<!--===============================================================================================-->
<script type="text/javascript" src="{{asset('js/master-layout-2-js/sweetalert.min.js')}}"></script>

<script type="text/javascript">
    $('.block2-btn-addcart').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to cart !", "success");
        });
    });

    $('.block2-btn-addwishlist').each(function () {
        var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
        $(this).on('click', function () {
            swal(nameProduct, "is added to wishlist !", "success");
        });
    });
</script>

<!--===============================================================================================-->

<script type="text/javascript" src={{asset("vendor/noui/nouislider.min.js")}}></script>
<script type="text/javascript">
    /*[ No ui ]
    ===========================================================*/
    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [50000, 5000000],
        connect: true,
        range: {
            'min': 50000,
            'max': 5000000
        },
        step: 100,
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function (values, handle) {
        skipValues[handle].innerHTML = Math.round(values[handle]);
    });
</script>

<script>
    $('input[name = "name"]').keypress(function (e) {
        if (e.which == 13) {
            $('form[name = "search-form"]').submit();
        }
    });
</script>
<!--===============================================================================================-->
<script src="{{asset('js/master-layout-2-js/main.js')}}"></script>
<script src={{asset("/js/jquery.paginate.js")}}></script>
<script src="{{asset('/js/product.js')}}"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="{{asset('js/my_script.js')}}"></script>
</body>
</html>