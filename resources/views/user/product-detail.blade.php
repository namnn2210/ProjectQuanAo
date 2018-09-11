@extends('layouts.user-master-layout')
@section('page-title','Product')
@section('content')
    <!-- breadcrumb -->
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="index.html" class="s-text16">
            Trang chủ
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="#" class="s-text16">
            {{$obj->category->name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17">
			{{$obj->name}}
		</span>
    </div>

    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>

                    <div class="slick3">
                        @foreach($obj->getImages($obj->images) as $item)
                            <div class="item-slick3" data-thumb="{{$item}}">
                                <div class="wrap-pic-w">
                                    <img src="{{$item}}" alt="IMG-PRODUCT">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5" id="row-item-{{$obj -> id}}">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{$obj->name}}
                </h4>
                <span class="block2-price m-text17 p-r-5" style="font-size: 27px">
                    {{$obj-> DiscountPriceString}}
                </span>
                <span class="block2-oldprice m-text7 p-r-5" style="font-size: 27px">
                    {{$obj -> OriginalPriceString}}
                </span>
                <span class="text-danger" style="font-size: 27px; margin-left: 2%">
                    -{{$obj -> discount}}%
                </span>

                <div class="p-t-33 p-b-60">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="num-product"
                                       value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10" id="add-cart-{{$obj->id}}">
                                <!-- Button -->
                                <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-b-45">
                    <span class="s-text8 m-r-35">SKU: {{$obj->id}}</span>
                    <span class="s-text8">Danh mục: {{$obj->category->name}}</span>
                </div>

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            {{$obj->description}}
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel
                            sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Relate Product -->
    <section class="relateproduct bgwhite p-t-45 p-b-138">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Sản phẩm liên quan
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($list_obj as $item)
                        <div class="item-slick2 p-l-15 p-r-15">
                            <!-- Block2 -->
                            <div class="block2" style="text-align: center">
                                <div class="block2-img wrap-pic-w of-hidden pos-relative">
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
                                    <img src="<?php echo explode("&",$item -> images,-1)[0];?>">

                                    <div class="block2-overlay trans-0-4">
                                        <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                            <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                            <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                        </a>

                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <!-- Button -->
                                            <button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="block2-txt p-t-20 btn-show-item">
                                    <a href="/product/{{$item->id}}" class="block2-name dis-block s-text3 p-b-5 btn-show-item">
                                        {{$item -> name}}
                                    </a>
                                    <span class="block2-price m-text6 p-r-5">
										    {{$item -> DiscountPriceString}}
									    </span>
                                    <span class="block2-oldprice m-text7 p-r-5">
										    {{$item -> OriginalPriceString}}
									    </span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection