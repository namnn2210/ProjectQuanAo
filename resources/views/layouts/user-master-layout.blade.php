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
    <link rel="stylesheet" href="{{asset('font/font-awesome/css/font-awesome.min.css')}}"/>
    <title>@yield('page-title')</title>
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
</head>
<body>
<div class="wrapper">
    <!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
            <div class="topbar">
                <div class="topbar-social">
                    <a href="#" class="topbar-social-item fa fa-facebook"></a>
                    <a href="#" class="topbar-social-item fa fa-instagram"></a>
                    <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
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
                <a href="index.html" class="logo">
                    <img src="{{asset('img/farfetch-logo.png')}}" alt="IMG-LOGO">
                </a>

                <!-- Menu -->
                <div class="wrap_menu">
                    <nav class="menu">
                        <ul class="main_menu">
                            <li>
                                <a href="#">Trang chủ</a>
                            </li>

                            <li>
                                <a href="#">Cửa hàng</a>
                            </li>

                            <li class="sale-noti">
                                <a href="#">Giảm giá sốc</a>
                            </li>

                            <li>
                                <a href="#">Features</a>
                            </li>

                            <li>
                                <a href="#">Blog</a>
                            </li>

                            <li>
                                <a href="#">Giới thiệu</a>
                            </li>

                            <li>
                                <a href="#">Liên hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <!-- Header Icon -->
                <div class="header-icons">
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{asset('img/icon-header-01.png')}}" class="header-icon1" alt="ICON">
                    </a>

                    <span class="linedivide1"></span>

                    <div class="header-wrapicon2">
                        <img src="{{asset('img/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown"
                             alt="ICON">
                        <span class="header-icons-noti">0</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="images/item-cart-01.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            White Shirt With Pleat Detail Back
                                        </a>

                                        <span class="header-cart-item-info">
											1 x $19.00
										</span>
                                    </div>
                                </li>

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="images/item-cart-02.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            Converse All Star Hi Black Canvas
                                        </a>

                                        <span class="header-cart-item-info">
											1 x $39.00
										</span>
                                    </div>
                                </li>

                                <li class="header-cart-item">
                                    <div class="header-cart-item-img">
                                        <img src="images/item-cart-03.jpg" alt="IMG">
                                    </div>

                                    <div class="header-cart-item-txt">
                                        <a href="#" class="header-cart-item-name">
                                            Nixon Porter Leather Watch In Tan
                                        </a>

                                        <span class="header-cart-item-info">
											1 x $17.00
										</span>
                                    </div>
                                </li>
                            </ul>

                            <div class="header-cart-total">
                                Total: $75.00
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @section('content')
    @show
    <footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
        <div class="flex-w p-b-90">
            <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
                <h4 class="s-text12 p-b-30">
                    GIỮ LIÊN LẠC VỚI CHÚNG TÔI
                </h4>

                <div>
                    <p class="s-text7 w-size27">
                        Bạn có câu hỏi gì không? Hãy cho chúng tôi biết tại cửa hàng số 8 Tôn Thất Thuyết, Nam Từ Liêm, Hà Nội hoặc gọi cho chúng tôi theo số (+84) 12345678
                    </p>

                    <div class="flex-m p-t-30">
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                        <a href="#" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                    </div>
                </div>
            </div>

            <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
                <h4 class="s-text12 p-b-30">
                    Danh mục sản phẩm
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Áo khoác
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Áo phông
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Áo sơ-mi
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Quần
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Vest
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Balo
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Giày
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Phụ Kiện
                        </a>
                    </li>
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
                        <a href="#" class="s-text7">
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
                    Help
                </h4>

                <ul>
                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Track Order
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Returns
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            Shipping
                        </a>
                    </li>

                    <li class="p-b-9">
                        <a href="#" class="s-text7">
                            FAQs
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
                        <input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
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
</body>
</html>