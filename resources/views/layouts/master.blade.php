<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>
    <link href="{{asset('/css/masterLayout_css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/masterLayout_css/metisMenu.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/masterLayout_css/sb-admin-2.css')}}" rel="stylesheet">
    <link href="{{asset('/font/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{URL::asset('css/form.css')}}">
</head>
<body>

<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

        <!--Thanh điều hướng ngang trên cùng-->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">SB Admin v2.0</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">

                    <!--Dẫn tới trang thông tin một admin-->
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <!--Dẫn tới trang thông tin một admin-->

                    <!--Dẫn tới trang cài đặt cho một admin-->
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <!--Dẫn tới trang cài đặt cho một admin-->

                    <li class="divider"></li>
                    <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!--Thanh điều hướng ngang trên cùng-->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">

                    <!--Thanh tìm kiếm-->
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </li>
                    <!--Thanh tìm kiếm-->

                    <!--Menu dropdown cho từng chức năng-->
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Function 1<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Sub_Function 1</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 2</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 3</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 4</a>
                            </li>
                        </ul>
                    </li>
                    <!--Menu dropdown cho từng chức năng-->

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Function 2<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Sub_Function 1</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 2</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 3</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 4</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Function 3<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Sub_Function 1</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 2</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 3</a>
                            </li>
                            <li>
                                <a href="#">Sub_Function 4</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-wrapper">
        @section('content')
        @show
    </div>

</div>

<!-- jQuery -->
<script src="{{asset('/js/masterLayout_js/jquery.min.js')}}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{asset('/js/masterLayout_js/bootstrap.min.js')}}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{asset('/js/masterLayout_js/metisMenu.min.js')}}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{asset('/js/masterLayout_js/sb-admin-2.js')}}"></script>

</body>
</html>