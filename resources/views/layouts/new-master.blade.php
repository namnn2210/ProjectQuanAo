<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
          name='viewport'/>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('font/font-awesome/css/font-awesome.min.css')}}"/>
    <!-- CSS Files -->
    <link href="{{asset('css/master-layout-3-css/bootstrap.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/master-layout-3-css/light-bootstrap-dashboard.css'.'?v=2.0.1')}}" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript" src={{asset("/js/numeral.js")}}></script>

    <link href="{{asset('css/master-layout-3-css/demo.css')}}" rel="stylesheet" />

</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange">

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/admin" class="simple-text logo-mini">
                    FF
                </a>
                <a href="/admin" class="simple-text logo-normal">
                    FarFetch
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item @yield('active-dashboard')">
                    <a class="nav-link" href="/admin">
                        <i class="nc-icon nc-chart-pie-35"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                        <i class="nc-icon nc-app"></i>
                        <p>
                            Quản lý tài khoản admin
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-user') " id="componentsExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-user')">
                                <a class="nav-link" href="/admin/account">
                                    <span class="sidebar-mini">AD</span>
                                    <span class="sidebar-normal">Danh sách tài khoản</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                        <i class="nc-icon nc-notes"></i>
                        <p>
                            Quản lý sản phẩm
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-product')" id="formsExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-list-product')">
                                <a class="nav-link" href="/admin/product">
                                    <span class="sidebar-mini">PD</span>
                                    <span class="sidebar-normal">Danh sách sản phẩm</span>
                                </a>
                            </li>
                            <li class="nav-item @yield('active-create-product')">
                                <a class="nav-link" href="/admin/product/create">
                                    <span class="sidebar-mini">NPD</span>
                                    <span class="sidebar-normal">Thêm sản phẩm mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tablesExamples">
                        <i class="nc-icon nc-paper-2"></i>
                        <p>
                            Quản lý danh mục
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-category')" id="tablesExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-list-category')">
                                <a class="nav-link" href="/admin/category">
                                    <span class="sidebar-mini">CT</span>
                                    <span class="sidebar-normal">Danh sách danh mục</span>
                                </a>
                            </li>
                            <li class="nav-item @yield('active-create-category')">
                                <a class="nav-link" href="/admin/category/create">
                                    <span class="sidebar-mini">NCT</span>
                                    <span class="sidebar-normal">Thêm danh mục mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#mapsExamples">
                        <i class="nc-icon nc-pin-3"></i>
                        <p>
                            Quản lý nhãn hiệu
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-brand')" id="mapsExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-list-brand')">
                                <a class="nav-link" href="/admin/brand">
                                    <span class="sidebar-mini">BR</span>
                                    <span class="sidebar-normal">Danh sách nhãn hiệu</span>
                                </a>
                            </li>
                            <li class="nav-item @yield('active-create-brand')">
                                <a class="nav-link" href="/admin/brand/create">
                                    <span class="sidebar-mini">NBR</span>
                                    <span class="sidebar-normal">Thêm nhãn hiệu mới</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item @yield('active-order')">
                    <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
                        <i class="nc-icon nc-puzzle-10"></i>
                        <p>
                            Quản lý đơn hàng
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-order')" id="pagesExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-list-order')">
                                <a class="nav-link" href="/admin/order">
                                    <span class="sidebar-mini">OD</span>
                                    <span class="sidebar-normal">Danh sách đơn hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" data-toggle="collapse" href="#subscriberExamples">
                        <i class="nc-icon nc-send"></i>
                        <p>
                            Quản lý subscriber
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse @yield('manage-subcriber')" id="subscriberExamples">
                        <ul class="nav">
                            <li class="nav-item @yield('active-list-subcriber')">
                                <a class="nav-link " href="/admin/subcriber">
                                    <span class="sidebar-mini">SB</span>
                                    <span class="sidebar-normal">Danh sách subscriber</span>
                                </a>
                                <a class="nav-link @yield('active-send-email')" href="/admin/subcriber/send-email">
                                    <span class="sidebar-mini">EM</span>
                                    <span class="sidebar-normal">Gửi email quảng cáo</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar"
                                class="btn btn-warning btn-fill btn-round btn-icon d-none d-lg-block">
                            <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                            <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                        </button>
                    </div>
                    <a class="navbar-brand" href="#pablo"> Trang chủ </a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="navbarDropdownMenuLink"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bullet-list-67"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a href="/admin/logout" class="dropdown-item text-danger">
                                    <i class="nc-icon nc-button-power"></i> Log out
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="content">
            <div class="container-fluid">
                @section('content')
                @show
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <nav>
                    <p class="copyright text-center">
                        ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </nav>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{asset('js/master-layout-3-js/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/master-layout-3-js/bootstrap.min.js')}}" type="text/javascript"></script>
<!--  jVector Map  -->
<script src="{{asset('js/master-layout-3-js/jquery-jvectormap.js')}}" type="text/javascript"></script>
<!--  Sweet Alert  -->
<script src="{{asset('js/master-layout-3-js/sweetalert2.min.js')}}" type="text/javascript"></script>
<!--  Sliders  -->
<script src="{{asset('js/master-layout-3-js/nouislider.js')}}" type="text/javascript"></script>
<!--  Bootstrap Select  -->
<script src="{{asset('js/master-layout-3-js/bootstrap-selectpicker.js')}}" type="text/javascript"></script>
<!--  jQueryValidate  -->
<script src="{{asset('js/master-layout-3-js/jquery.validate.min.js')}}" type="text/javascript"></script>
<!--  Bootstrap Table Plugin -->
<script src="{{asset('js/master-layout-3-js/bootstrap-table.js')}}"></script>
<!--  DataTable Plugin -->
<script src="{{asset('js/master-layout-3-js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/master-layout-3-js/jquery.bootstrap-wizard.js')}}"></script>
<script src="{{asset('js/master-layout-3-js/bootstrap-switch.js')}}"></script>
<script src="{{asset('js/master-layout-3-js/bootstrap-tagsinput.js')}}"></script>
<script src="{{asset('js/master-layout-3-js/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('js/master-layout-3-js/light-bootstrap-dashboard.js'.'?v=2.0.1')}}"
        type="text/javascript"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script src="{{asset('js/master-layout-3-js/demo.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Init Wizard
        demo.initLBDWizard();
    });
</script>


</html>
