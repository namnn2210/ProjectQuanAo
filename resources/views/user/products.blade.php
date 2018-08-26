@extends('layouts.user-master-layout',['currentPage' => 'Products'])
@section('page-title','Product')
@section('content')
    <nav aria-label="breadcrumb" class="align-items-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Product</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                <?php
                    foreach ($obj_category as $item){
                        if($item -> id == $chosen_category){
                            echo $item->name;
                        }
                    }
                ?>
            </li>
        </ol>
    </nav>
    <section class="bgwhite p-t-55 p-b-65" id="result2">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                    <div class="leftbar p-r-20 p-r-0-sm">
                        <!--  -->
                        <h4 class="m-text14 p-b-7">
                            Categories
                        </h4>

                        <ul class="p-b-54">
                            <li class="p-t-4">
                                <a href="{{url()->current().'?categoryId=0'}}" class="s-text13 active1">
                                    <span class="{{$chosen_category==0?'text-danger':''}}">All</span>
                                </a>
                            </li>
                            @foreach($obj_category as $item)
                                <li class="p-t-4">
                                    <a href="{{url()->current().'?categoryId='.$item->id}}" class="s-text13 active1">
                                        <span class="{{$chosen_category==$item->id?'text-danger':''}}">{{$item -> name}}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <!-- Filters -->
                        <h4 class="m-text14 p-b-32">
                            Filters
                        </h4>

                        <div class="filter-price p-t-22 p-b-50 bo3">
                            <div class="m-text15 p-b-17">
                                Price
                            </div>

                            <div class="wra-filter-bar">
                                <div id="filter-bar"></div>
                            </div>

                            <div class="flex-sb-m flex-w p-t-16">
                                <div class="w-size11">
                                    <!-- Button -->

                                </div>

                                <div class="s-text3 p-t-10 p-b-10">
                                    Range: $<span id="value-lower">610</span> - $<span id="value-upper">980</span>
                                </div>
                            </div>
                        </div>

                        <div class="search-product pos-relative bo4 of-hidden">
                            <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="name" placeholder="Search Products...">
                            <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4 btn-search">
                                <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Filters -->

                <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
                    <!--  -->
                    <div class="flex-sb-m flex-w p-b-35">
                        <div class="flex-w">
                            <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                                <select class="selection-2" name="sorting">
                                    <option value="none">Default Sorting</option>
                                    <option value="asc">Price: low to high</option>
                                    <option value="desc">Price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Product -->
                    <div class="row" id="example">
                        @foreach($obj as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 p-b-50 row-item">
                                <!-- Block2 -->
                                <div class="block2">
                                    <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
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

                                    <div class="block2-txt p-t-20">
                                        <a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
                                            {{$item -> name}}
                                        </a>

                                        <span class="block2-price m-text6 p-r-5">
										${{$item -> price}}
									</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a class="load-more" href="#" id="loadMore">Load More</a>

                    <p class="totop cat">
                        <a href="#top">Back to top</a>
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection